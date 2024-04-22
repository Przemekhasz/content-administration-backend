<?php

namespace App\Infrastructure\Admin\Page;

use App\Infrastructure\Entity\Page\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('pageName', 'Nazwa strony')
            ->setHelp('Podaj nazwę strony, która będzie wyświetlana użytkownikom.');
        yield NumberField::new('pageNumber', 'Numer strony')
            ->setHelp('Numer porządkowy strony w dokumentacji lub wykazie.');
        yield BooleanField::new('isPublic', 'Publiczna?')
            ->setHelp('Decyduje czy strona jest publicznie dostępna.');

        yield AssociationField::new('banner', 'Baner')
            ->setHelp('Wybierz baner wyświetlany na stronie.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('logo', 'Logotyp')
            ->setHelp('Przypisz logotyp do strony.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('menuItem', 'Element menu')
            ->setHelp('Przypisz menu do tej strony.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('pageHeaders', 'Nagłówki')
            ->setHelp('Przypisz nagłówek do strony.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('socialMediaIcons', 'Ikony mediów społecznościowych')
            ->setHelp('Przypisz ikonę mediów społecznościowych do strony.')
            ->setFormTypeOptions(['by_reference' => true]);
    }
}
