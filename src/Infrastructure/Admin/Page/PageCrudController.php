<?php

namespace App\Infrastructure\Admin\Page;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use Doctrine\ORM\NonUniqueResultException;
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

    public function __construct(
        private readonly GlobalStylesRepository $globalStylesRepository,
    ) {
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
        yield AssociationField::new('bodyTexts', 'Bloki tekstu')
            ->setHelp('Przypisz bloki tekstu do strony.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('socialMediaIcons', 'Ikony mediów społecznościowych')
            ->setHelp('Przypisz ikonę mediów społecznościowych do strony.')
            ->setFormTypeOptions(['by_reference' => true]);

        yield AssociationField::new('galleries', 'Galleries')
            ->setHelp('Associate galleries with this page.')
            ->setFormTypeOptions(['by_reference' => false]);

        yield AssociationField::new('projects', 'Projects')
            ->setHelp('Associate projects with this page.')
            ->setFormTypeOptions(['by_reference' => false]);

        yield AssociationField::new('globalStyles', 'Motyw współdzielony')
            ->setHelp('Domyślny motyw')
            ->setFormTypeOptions([
                'by_reference' => true,
            ])
            ->setDisabled();

        yield AssociationField::new('styles', 'Motywy wybranych strony')
            ->setHelp('Przypisz motyw strony')
            ->setFormTypeOptions(['by_reference' => true]);
    }

    /**
     * @throws NonUniqueResultException
     */
    public function createEntity(string $entityFqcn): Page
    {
        $styles = $this->globalStylesRepository->findLastGlobalStyles();
        $page = new Page();
        $page->setGlobalStyles($styles);

        return $page;
    }
}
