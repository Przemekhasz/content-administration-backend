<?php

namespace App\Infrastructure\Admin\Contact;

use App\Infrastructure\Entity\CMS\Contact;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // Add the "show" action so it appears in all pages by default
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action
                    ->setLabel('Poka')
                    ->setIcon('fa fa-eye')
                    ->addCssClass('btn btn-info');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addPanel('Wiadomości')->setIcon('fa fa-envelope');
        yield EmailField::new('email', 'Email');
        yield TextField::new('topic', 'Temat');
        yield TextareaField::new('content', 'Zawartość')
            ->hideOnIndex();
        yield TextareaField::new('replyMsg', 'Odpowiedź')
            ->hideOnIndex();
        yield BooleanField::new('isAnswered', 'Odpowiedziano?');
        yield DateTimeField::new('createdAt', 'Data Utworzenia')->setFormTypeOptions([
            'disabled' => true
        ])->onlyOnDetail();
        yield DateTimeField::new('updatedAt', 'Data aktualizacji')->setFormTypeOptions([
            'disabled' => true
        ])->onlyOnDetail();
    }
}
