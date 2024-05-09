<?php

namespace App\Infrastructure\Admin\Footer;

use App\Infrastructure\Entity\Footer\Footer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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

    public function configureActions(Actions $actions): Actions
    {
        $actions = parent::configureActions($actions);

        if ($this->isGranted('ROLE_VISITOR') && !$this->isGranted('ROLE_ADMIN')) {
            $actions->disable(Action::NEW, Action::EDIT, Action::DELETE);
        }

        return $actions;
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
