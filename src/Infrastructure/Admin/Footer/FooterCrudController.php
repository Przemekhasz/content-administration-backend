<?php

namespace App\Infrastructure\Admin\Footer;

use App\Infrastructure\Entity\Footer\Footer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Footer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Stopka');
        yield IdField::new('id')->hideOnForm();

        yield TextField::new('siteName', 'Nazwa strony');
        yield TextField::new('description', 'Opis');
        yield TextField::new('phoneNumber', 'Numer telefonu');
        yield TextField::new('email', 'Email');
        yield TextField::new('followUs', 'Śledź nas tekst');
    }
}
