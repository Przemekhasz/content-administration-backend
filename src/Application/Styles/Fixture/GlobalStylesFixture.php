<?php

namespace App\Application\Styles\Fixture;

use App\Infrastructure\Entity\Styles\GlobalStyles;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class GlobalStylesFixture extends Fixture
{
    public function __construct(
        private readonly GlobalStylesRepository $globalStylesRepository,
        private readonly LoggerInterface $logger
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $globalStyles = new GlobalStyles();

        $globalStyles->setName('Main');
        $globalStyles->setPrimaryColor('#8611c5');
        $globalStyles->setSecondaryColor('#4b1bbb');
        $globalStyles->setBackgroundColor('#b8b8b8');
        $globalStyles->setCategoriesBackgroundColor('#8c1f8e');
        $globalStyles->setTagsBackgroundColor('#4d23af');
        $globalStyles->setCategoriesColor('#ffffff');
        $globalStyles->setTagsColor('#ffffff');
        $globalStyles->setTextColor('#000000');
        $globalStyles->setBannerTextBold(true);
        $globalStyles->setBannerTextShadow(true);
        $globalStyles->setBannerTextAnimation(true);
        $globalStyles->setBannerTextFontFamily('Arial');
        $globalStyles->setBannerTextShadowColor('#feffad');
        $globalStyles->setLinkColor('#06cb9a');
        $globalStyles->setHoverColor('#cd00db');
        $globalStyles->setHeadingFont('Roboto');
        $globalStyles->setBodyFont('PT Sans');

        $this->globalStylesRepository->persist($globalStyles);

        $this->logger->info('Successfully created default global styles');
    }
}
