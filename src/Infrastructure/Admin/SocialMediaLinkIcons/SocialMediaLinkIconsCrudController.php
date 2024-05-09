<?php

namespace App\Infrastructure\Admin\SocialMediaLinkIcons;

use App\Infrastructure\Entity\Page\SocialMediaLinkIcons;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SocialMediaLinkIconsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialMediaLinkIcons::class;
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
        yield FormField::addPanel('Social Media Links')->setIcon('fa fa-share-alt');

        yield ChoiceField::new('name', 'Portal')
            ->setChoices([
                'Facebook' => 'facebook',
                'Twitter' => 'twitter',
                'Instagram' => 'instagram',
                'LinkedIn' => 'linkedin',
                'YouTube' => 'youtube',
                'Pinterest' => 'pinterest',
                'Snapchat' => 'snapchat',
                'TikTok' => 'tiktok',
            ]);

        yield UrlField::new('url', 'URL')
            ->setHelp('Enter the full URL to the social media profile.');
    }
}
