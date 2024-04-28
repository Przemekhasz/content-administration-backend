<?php

namespace App\Infrastructure\Admin\Image;

use App\Controller\Admin\CategoryCrudController;
use App\Infrastructure\Admin\Gallery\GalleryCrudController;
use App\Infrastructure\Admin\Tag\TagCrudController;
use App\Infrastructure\Entity\Gallery\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            AssociationField::new('gallery')
                ->setCrudController(GalleryCrudController::class),
            TextEditorField::new('description'),
            ImageField::new('imagePath')
                ->setBasePath('uploads/img')
                ->setUploadDir('public/uploads/img')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('categories')
                ->setCrudController(CategoryCrudController::class),
            AssociationField::new('tags')
                ->setCrudController(TagCrudController::class),
        ];
    }
}
