<?php

namespace App\Infrastructure\Admin\ProjectDetail;

use App\Infrastructure\Entity\Project\ProjectDetail;
use App\Infrastructure\Field\CKEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProjectDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectDetail::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            CKEditorField::new('description', 'Opis'),
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
