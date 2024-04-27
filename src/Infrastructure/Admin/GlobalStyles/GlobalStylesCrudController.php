<?php

namespace App\Infrastructure\Admin\GlobalStyles;

use App\Infrastructure\Entity\Styles\GlobalStyles;
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
        return $actions
            ->disable('new', 'delete');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Ogólne'),
            TextField::new('name', 'Nazwa stylów')->setFormTypeOptions(['row_attr' => ['class' => 'col-md-6']]),

            FormField::addPanel('Kolory'),
            ColorField::new('primaryColor', 'Główny kolor tekstu'),
            ColorField::new('secondaryColor', 'Drugorzędny kolor tekstu'),
            ColorField::new('backgroundColor', 'Kolor tła'),
            ColorField::new('textColor', 'Kolor tekstu'),

            FormField::addPanel('Kolory kategorii'),
            ColorField::new('categoriesBackgroundColor', 'Kolor tła kategorii'),
            ColorField::new('categoriesColor', 'Kolor tekstu dla kategorii'),
            FormField::addPanel('Kolory tagów'),
            ColorField::new('tagsBackgroundColor', 'Kolor tła tagów'),
            ColorField::new('tagsColor', 'Kolor tekstu dla tagów'),

            FormField::addPanel('Baner'),
            BooleanField::new('bannerTextBold', 'Czy tekst na banerze ma być pogróbiony?'),
            BooleanField::new('bannerTextShadow', 'Czy tekst na banerze ma mieć cienie?'),
            BooleanField::new('bannerTextAnimation', 'Czy tekst na banerze ma mieć animacje?'),
            ChoiceField::new('bannerTextFontFamily', 'Czcionka tekstu na banerze')->setChoices([
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
            ColorField::new('bannerTextShadowColor', 'Kolor cienia tekstu na banerze'),

            FormField::addPanel('Inne'),
            ColorField::new('linkColor', 'Kolor linków'),
            ColorField::new('hoverColor', 'Kolor po najechaniu'),
            ChoiceField::new('headingFont', 'Czcionka tytułów')->setChoices([
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
