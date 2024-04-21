<?php

namespace App\Infrastructure\Admin\PageHeader;

use App\Infrastructure\Entity\CMS\PageHeader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageHeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageHeader::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Nagłówek');

        yield TextField::new('name', 'Nazwa nagłówka');
    }
}
