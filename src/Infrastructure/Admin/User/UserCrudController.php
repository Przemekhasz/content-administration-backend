<?php

namespace App\Infrastructure\Admin\User;

use App\Infrastructure\Entity\User\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Konto');
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('userName', 'Nazwa użytkownika');
        yield TextField::new('password', 'Hasło')->hideOnIndex();
        yield ArrayField::new('roles', 'Rola');
    }
}
