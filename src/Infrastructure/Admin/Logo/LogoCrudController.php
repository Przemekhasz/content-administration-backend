<?php

namespace App\Infrastructure\Admin\Logo;

use App\Infrastructure\Entity\Page\Logo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LogoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Logo');
        yield IdField::new('id')->hideOnForm();

        yield TextField::new('name', 'Nazwa');
        yield ImageField::new('logo', 'Logo')
            ->setBasePath('uploads/img')
            ->setUploadDir('public/uploads/img')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
    }
}
