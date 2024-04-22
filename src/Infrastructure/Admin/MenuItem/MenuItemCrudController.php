<?php

namespace App\Infrastructure\Admin\MenuItem;

use App\Infrastructure\Entity\Page\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Menu Item Name');
        yield TextField::new('url', 'Link to Page');
    }
}
