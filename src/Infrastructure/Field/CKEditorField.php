<?php

namespace App\Infrastructure\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

final class CKEditorField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(CKEditorType::class)
            ->setTemplatePath('admin/field/show_data_modal.html.twig')
            ;
    }
}
