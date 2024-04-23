<?php

namespace App\Infrastructure\Admin\SocialMediaLinkIcons;

use App\Infrastructure\Entity\Page\SocialMediaLinkIcons;
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
