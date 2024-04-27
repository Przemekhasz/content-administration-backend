<?php

namespace App\Infrastructure\Admin\Project;

use App\Infrastructure\Entity\Project\Project;
use App\Infrastructure\Type\ProjectDetailType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Title'),
            TextareaField::new('mainDescription', 'Main Description'),
            AssociationField::new('author', 'Autor')
                ->setFormTypeOptions(['by_reference' => false]),
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
