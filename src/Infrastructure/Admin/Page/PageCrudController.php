<?php

namespace App\Infrastructure\Admin\Page;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use Doctrine\ORM\NonUniqueResultException;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
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

    public function configureActions(Actions $actions): Actions
    {
        $actions = parent::configureActions($actions);

        if ($this->isGranted('ROLE_VISITOR') && !$this->isGranted('ROLE_ADMIN')) {
            $actions->disable(Action::NEW, Action::EDIT, Action::DELETE);
        }

        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Page');
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('pageName', 'Page name')
            ->setHelp('Enter the name of the page that will be displayed to users.');
        yield NumberField::new('pageNumber', 'Page number')
            ->setHelp('The ordinal number of the page in the documentation or listing.');
        yield BooleanField::new('isPublic', 'Public?')
            ->setHelp('Decides whether the page is publicly accessible.');

        yield AssociationField::new('banner', 'Banner')
            ->setHelp('Select the banner displayed on the page.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('logo', 'Logo')
            ->setHelp('Assign a logo to the page.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('menuItem', 'Menu item')
            ->setHelp('Assign a menu item to this page.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('pageHeaders', 'Headers')
            ->setHelp('Assign headers to the page.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('bodyTexts', 'Text blocks')
            ->setHelp('Assign text blocks to the page.')
            ->setFormTypeOptions(['by_reference' => true]);
        yield AssociationField::new('socialMediaIcons', 'Social media icons')
            ->setHelp('Assign social media icons to the page.')
            ->setFormTypeOptions(['by_reference' => true]);

        yield FormField::addTab('Galleries');
        yield AssociationField::new('galleries', 'Galleries')
            ->setHelp('Associate galleries with this page.')
            ->setFormTypeOptions(['by_reference' => false]);

        yield FormField::addTab('Projects');
        yield AssociationField::new('projects', 'Projects')
            ->setHelp('Associate projects with this page.')
            ->setFormTypeOptions(['by_reference' => false]);
        yield BooleanField::new('showPinnedProjects', 'Show pinned projects?')
            ->setHelp('If selected, only pinned projects will be displayed on the page; otherwise, all projects will be displayed.');

        yield FormField::addTab('Theme');
        yield AssociationField::new('globalStyles', 'Shared theme')
            ->setHelp('Default theme')
            ->setFormTypeOptions([
                'by_reference' => true,
            ])
            ->setDisabled();

        yield AssociationField::new('styles', 'Page-specific themes')
            ->setHelp('Assign a theme to the page.')
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
