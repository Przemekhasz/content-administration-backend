<?php

namespace App\Infrastructure\Admin\Gallery;

use App\Infrastructure\Entity\CMS\Gallery;
use App\Infrastructure\Type\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gallery::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Gallery Name'),
            CollectionField::new('images', 'Images')
                ->setEntryType(ImageType::class)
                ->onlyOnForms()
        ];
    }
}
