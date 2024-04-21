<?php

namespace App\Infrastructure\Admin\Banner;

use App\Infrastructure\Entity\CMS\Banner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        yield TextField::new('image', 'Obrazek');
    }
}
