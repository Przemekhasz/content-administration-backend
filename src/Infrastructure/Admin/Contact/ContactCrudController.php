<?php

namespace App\Infrastructure\Admin\Contact;

use App\Infrastructure\Entity\Contact\Contact;
use App\Infrastructure\Field\CKEditorField;
use App\Infrastructure\Repository\Page\ContactRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ContactCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly ContactRepository $contactRepository,
        private readonly ?string $pageUrl,
        private readonly ?string $pageName,
        private readonly ?string $fullName,
        private readonly ?string $emailAddress,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        $replyAction = Action::new('reply', 'Odpowiedz', 'fa fa-reply')
            ->linkToCrudAction('sendReply')
            ->displayIf(static function ($entity) {
                return !$entity->isAnswered();
            });

        if ($this->isGranted('ROLE_VISITOR') && !$this->isGranted('ROLE_ADMIN')) {
            $actions->disable(Action::NEW, Action::EDIT, Action::DELETE, Action::DETAIL, Action::INDEX);
        }

        $actions
            ->add(Crud::PAGE_INDEX, $replyAction)
            ->add(Crud::PAGE_DETAIL, $replyAction)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action
                    ->setLabel('Poka')
                    ->setIcon('fa fa-eye');
            });

        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addPanel('Wiadomości')->setIcon('fa fa-envelope');

        yield EmailField::new('email', 'Email')
            ->setFormTypeOption('disabled', Crud::PAGE_EDIT === $pageName);

        yield TextField::new('topic', 'Temat')
            ->setFormTypeOption('disabled', Crud::PAGE_EDIT === $pageName);

        yield TextareaField::new('content', 'Zawartość')
            ->hideOnIndex()
            ->setFormTypeOption('disabled', Crud::PAGE_EDIT === $pageName);

        yield CKEditorField::new('replyMsg', 'Odpowiedź')
            ->hideOnIndex();

        yield BooleanField::new('isAnswered', 'Odpowiedziano?')
            ->renderAsSwitch(Crud::PAGE_EDIT !== $pageName)
            ->setFormTypeOption('disabled', Crud::PAGE_EDIT === $pageName);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function sendReply(Request $request, Environment $twig): Response
    {
        $contactId = $request->get('entityId');
        $contact = $this->contactRepository->find($contactId);

        $htmlContent = $twig->render('emails/reply_email.html.twig', [
            'name' => $contact->getEmail(),
            'content' => $contact->getContent(),
            'message' => $contact->getReplyMsg(),
            'topic' => $contact->getTopic(),
            'page_url' => $this->pageUrl,
            'page_name' => $this->pageName,
            'fullName' => $this->fullName,
        ]);

        $email = (new Email())
            ->from($this->emailAddress)
            ->to($contact->getEmail())
            ->subject('[RE] '.$contact->getTopic())
            ->html($htmlContent);

        $this->mailer->send($email);

        $contact->setIsAnswered(true);
        $this->contactRepository->update($contact);

        $this->addFlash('success', 'Reply sent successfully.');

        return $this->redirect($this->generateUrl('admin'));
    }
}
