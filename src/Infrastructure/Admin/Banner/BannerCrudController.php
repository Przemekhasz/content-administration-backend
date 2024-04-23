<?php

namespace App\Infrastructure\Admin\Banner;

use App\Infrastructure\Entity\Page\Banner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BannerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banner::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Baner');
        yield IdField::new('id')->hideOnForm();

        yield TextField::new('name', 'Nazwa');
        yield ImageField::new('image', 'Obrazek')
            ->setBasePath('uploads/img')
            ->setUploadDir('public/uploads/img')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
    }
}
