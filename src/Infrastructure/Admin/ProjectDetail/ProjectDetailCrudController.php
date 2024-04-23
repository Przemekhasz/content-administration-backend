<?php

namespace App\Infrastructure\Admin\ProjectDetail;

use App\Infrastructure\Entity\Page\ProjectDetail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            TextField::new('description', 'Description'),
            ImageField::new('imagePath')
                ->setBasePath('uploads/img')
                ->setUploadDir('public/uploads/img')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            AssociationField::new('project', 'Project')
                ->setFormTypeOptions(['by_reference' => true]),
        ];
    }
}
