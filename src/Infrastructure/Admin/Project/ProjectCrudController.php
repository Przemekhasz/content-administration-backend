<?php

namespace App\Infrastructure\Admin\Project;

use App\Infrastructure\Entity\Project\Project;
use App\Infrastructure\Field\CKEditorField;
use App\Infrastructure\Type\ProjectDetailType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
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
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Title'),
            CKEditorField::new('mainDescription', 'Opis'),
            AssociationField::new('author', 'Autor'),
            CollectionField::new('details', 'Details')
                ->setEntryType(ProjectDetailType::class)
                ->allowAdd()
                ->allowDelete(),
            AssociationField::new('categories', 'Categories')
                ->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('tags', 'Tags')
                ->setFormTypeOptions(['by_reference' => false]),
        ];
    }
}
