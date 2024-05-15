<?php

namespace App\Infrastructure\Admin\GlobalStyles;

use App\Infrastructure\Entity\Styles\GlobalStyles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GlobalStylesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GlobalStyles::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions = parent::configureActions($actions);

        if ($this->isGranted('ROLE_VISITOR') && !$this->isGranted('ROLE_ADMIN')) {
            $actions->disable(Action::NEW, Action::EDIT, Action::DELETE);
        }

        return $actions->disable('new', 'delete');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Global styles'),
            TextField::new('name', 'Styles name')->setFormTypeOptions(['row_attr' => ['class' => 'col-md-6']]),

            FormField::addPanel('Colors'),
            ColorField::new('primaryColor', 'Primary color'),
            ColorField::new('secondaryColor', 'Seconary color'),
            ColorField::new('backgroundColor', 'Background color'),
            ColorField::new('textColor', 'Text color'),

            FormField::addPanel('Category color'),
            ColorField::new('categoriesBackgroundColor', 'Category background color'),
            ColorField::new('categoriesColor', 'Category text color'),
            FormField::addPanel('Tag color'),
            ColorField::new('tagsBackgroundColor', 'Tag background color'),
            ColorField::new('tagsColor', 'Tag text color'),

            FormField::addPanel('Baner'),
            BooleanField::new('bannerTextBold', 'Banner text bold?'),
            BooleanField::new('bannerTextShadow', 'Banner text shadow?'),
            BooleanField::new('bannerTextAnimation', 'Banner text animation?'),
            ChoiceField::new('bannerTextFontFamily', 'Banner text font family')->setChoices([
                'Arial' => 'Arial',
                'Times New Roman' => 'Times New Roman',
                'Helvetica' => 'Helvetica',
                'Georgia' => 'Georgia',
                'Courier New' => 'Courier New',
                'Verdana' => 'Verdana',
                'Roboto' => 'Roboto',
                'PT Sans' => 'PT Sans',
                'Tahoma' => 'Tahoma',
                'Trebuchet MS' => 'Trebuchet MS',
                'Impact' => 'Impact',
                'Comic Sans MS' => 'Comic Sans MS',
            ]),
            ColorField::new('bannerTextShadowColor', 'Banner text shadow color'),

            FormField::addPanel('Other'),
            ColorField::new('linkColor', 'Link color'),
            ColorField::new('hoverColor', 'Hover color'),
            ChoiceField::new('headingFont', 'Heading font')->setChoices([
                'Arial' => 'Arial',
                'Times New Roman' => 'Times New Roman',
                'Helvetica' => 'Helvetica',
                'Georgia' => 'Georgia',
                'Courier New' => 'Courier New',
                'Verdana' => 'Verdana',
                'Roboto' => 'Roboto',
                'PT Sans' => 'PT Sans',
                'Tahoma' => 'Tahoma',
                'Trebuchet MS' => 'Trebuchet MS',
                'Impact' => 'Impact',
                'Comic Sans MS' => 'Comic Sans MS',
            ]),
            ChoiceField::new('bodyFont', 'Czionka zawartości')->setChoices([
                'Arial' => 'Arial',
                'Times New Roman' => 'Times New Roman',
                'Helvetica' => 'Helvetica',
                'Georgia' => 'Georgia',
                'Courier New' => 'Courier New',
                'Verdana' => 'Verdana',
                'Roboto' => 'Roboto',
                'PT Sans' => 'PT Sans',
                'Tahoma' => 'Tahoma',
                'Trebuchet MS' => 'Trebuchet MS',
                'Impact' => 'Impact',
                'Comic Sans MS' => 'Comic Sans MS',
            ]),
        ];
    }
}
