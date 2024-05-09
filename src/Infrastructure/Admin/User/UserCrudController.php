<?php

namespace App\Infrastructure\Admin\User;

use App\Infrastructure\Entity\User\User;
use App\Infrastructure\Repository\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions = parent::configureActions($actions);

        if ($this->isGranted('ROLE_VISITOR') && !$this->isGranted('ROLE_ADMIN')) {
            $actions->disable(Action::NEW, Action::EDIT, Action::DELETE);
        }

        return $actions;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!empty($entityInstance->getPassword())) {
            $entityInstance->setPassword(password_hash($entityInstance->getPassword(), PASSWORD_DEFAULT));
        }
        parent::persistEntity($entityManager, $entityInstance);
    }

    /**
     * @throws \Exception
     */
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $existedUserEntity = $this->userRepository->findById((int)$entityInstance->getId());

        if ($existedUserEntity->getPassword() !== $entityInstance->getPassword()) {
            $entityInstance->setPassword(password_hash($entityInstance->getPassword(), PASSWORD_DEFAULT));
        }
        parent::updateEntity($entityManager, $entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Konto');
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('userName', 'Nazwa użytkownika');
        yield TextField::new('password', 'Hasło')->hideOnIndex();
        yield ChoiceField::new('roles', 'Rola')
            ->allowMultipleChoices()
            ->setChoices([
                'Admin' => 'ROLE_ADMIN',
                'User' => 'ROLE_USER',
                'Visitor' => 'ROLE_VISITOR',
            ]);
    }
}
