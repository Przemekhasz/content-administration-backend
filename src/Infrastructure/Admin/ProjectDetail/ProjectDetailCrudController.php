<?php

namespace App\Infrastructure\Admin\ProjectDetail;

use App\Infrastructure\Entity\Project\ProjectDetail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectDetail::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('description', 'Opis'),
            ImageField::new('imagePath')
                ->setBasePath('uploads/img')
                ->setUploadDir('public/uploads/img')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('project', 'Projekt')
                ->setFormTypeOptions(['by_reference' => true]),
        ];
    }
}
