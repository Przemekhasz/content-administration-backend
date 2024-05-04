<?php

namespace App\Infrastructure\Admin\BodyText;

use App\Infrastructure\Entity\Footer\Footer;
use App\Infrastructure\Entity\Page\BodyText;
use App\Infrastructure\Field\CKEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BodyTextCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BodyText::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Stopka');
        yield IdField::new('id')->hideOnForm();

        yield TextField::new('heading', 'Nagłówek');
        yield CKEditorField::new('body', 'Zawartość');
    }
}
