<?php

namespace App\Infrastructure\Admin\Styles;

use App\Infrastructure\Entity\Page\Styles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StylesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Styles::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nazwa motywu');

        yield ColorField::new('appBarBackground', 'Kolor tła AppBar');
        yield ColorField::new('footerBackground', 'Kolor tła stopki');
        yield ColorField::new('emailBackground', 'Kolor tła email');
        yield ColorField::new('background', 'Kolor tła głównego');
        yield ColorField::new('categoryColor', 'Kolor kategorii');
        yield ColorField::new('tagColor', 'Kolor tagu');

        yield ChoiceField::new('fontFamily', 'Rodzina czcionek')
            ->setChoices([
                'Arial' => 'Arial',
                'Times New Roman' => 'Times New Roman',
                'Helvetica' => 'Helvetica',
                'Georgia' => 'Georgia',
                'Courier New' => 'Courier New',
            ]);
    }
}
