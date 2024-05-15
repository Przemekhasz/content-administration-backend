<?php

namespace App\Infrastructure\Admin;

use App\Infrastructure\Entity\Contact\Contact;
use App\Infrastructure\Entity\Footer\Footer;
use App\Infrastructure\Entity\Gallery\Gallery;
use App\Infrastructure\Entity\Gallery\Image;
use App\Infrastructure\Entity\Page\Banner;
use App\Infrastructure\Entity\Page\BodyText;
use App\Infrastructure\Entity\Page\Category;
use App\Infrastructure\Entity\Page\Logo;
use App\Infrastructure\Entity\Page\MenuItem as MenuItemEntity;
use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Entity\Page\PageHeader;
use App\Infrastructure\Entity\Page\SocialMediaLinkIcons;
use App\Infrastructure\Entity\Page\Tag;
use App\Infrastructure\Entity\Project\Project;
use App\Infrastructure\Entity\Project\ProjectDetail;
use App\Infrastructure\Entity\Styles\GlobalStyles;
use App\Infrastructure\Entity\Styles\Styles;
use App\Infrastructure\Entity\User\User;
use App\Infrastructure\Exception\Gallery\GalleryImageNotFoundException;
use App\Infrastructure\Exception\Project\ProjectNotFoundException;
use App\Infrastructure\Repository\Gallery\ImageRepository;
use App\Infrastructure\Repository\Page\ContactRepository;
use App\Infrastructure\Repository\Project\ProjectRepository;
use Doctrine\ORM\NonUniqueResultException;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Locale;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly ContactRepository $contactRepository,
        private readonly ImageRepository $imageRepository,
        private readonly ProjectRepository $projectRepository,
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        parent::index();

        $newMessagesCount = $this->contactRepository->countUnansweredContacts();
        $answeredMessagesCount = $this->contactRepository->countAnsweredContacts();
        $messagesCount = $this->contactRepository->countContacts();
        $imagesCount = $this->imageRepository->countImages();
        $projectsCount = $this->projectRepository->countProjects();

        return $this->render('admin/dashboard/dashboard.html.twig', [
            'new_messages_count' => $newMessagesCount,
            'answered_messages_count' => $answeredMessagesCount,
            'messages_count' => $messagesCount,
            'images_count' => $imagesCount,
            'projects_count' => $projectsCount,
        ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Page Builder');
        yield MenuItem::linkToCrud('Pages', 'fa-solid fa-file-alt', Page::class);

        yield MenuItem::section('Configuration');
        yield MenuItem::linkToCrud('Shared Theme', 'fa-solid fa-cog', GlobalStyles::class);
        yield MenuItem::linkToCrud('Page-Specific Themes', 'fa-solid fa-palette', Styles::class);

        yield MenuItem::section('Management');
        yield MenuItem::subMenu('User Management', 'fa-solid fa-users')
            ->setSubItems([
                MenuItem::linkToCrud('User', 'fa-solid fa-user', User::class),
            ]);

        yield MenuItem::subMenu('Content Management', 'fa-solid fa-edit')
            ->setSubItems([
                MenuItem::section('Banner & Logo'),
                MenuItem::linkToCrud('Banners', 'fa-solid fa-image', Banner::class),
                MenuItem::linkToCrud('Logos', 'fa-solid fa-flag', Logo::class),
                MenuItem::linkToCrud('Footer', 'fa-solid fa-wpforms', Footer::class),

                MenuItem::section('Page Content'),
                MenuItem::linkToCrud('Social Media Icons', 'fa fa-share-alt', SocialMediaLinkIcons::class),
                MenuItem::linkToCrud('Menu', 'fa fa-list-ul', MenuItemEntity::class),
                MenuItem::linkToCrud('Headers', 'fa fa-heading', PageHeader::class),
                MenuItem::linkToCrud('Text Blocks', 'fa fa-envelope-open-text', BodyText::class),

                MenuItem::section('Photo Gallery'),
                MenuItem::linkToCrud('Galleries', 'fas fa-images', Gallery::class),
                MenuItem::linkToCrud('Photos', 'fas fa-image', Image::class),

                MenuItem::section('Projects'),
                MenuItem::linkToCrud('Projects', 'fas fa-list', Project::class),
                MenuItem::linkToCrud('Project Details', 'fas fa-list', ProjectDetail::class),

                MenuItem::section('Tags and Categories'),
                MenuItem::linkToCrud('Categories', 'fas fa-tags', Category::class),
                MenuItem::linkToCrud('Tags', 'fas fa-tag', Tag::class),
            ]);

        yield MenuItem::section('Administration');
        yield MenuItem::subMenu('Inquiries', 'fa-solid fa-envelope')
            ->setSubItems([
                MenuItem::linkToCrud('Messages', 'fa-solid fa-message', Contact::class),
            ]);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Content managment system')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('Content managment <span class="text-small">system.</span>')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('messages')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()

            // set this option if you want to enable locale switching in dashboard.
            // IMPORTANT: this feature won't work unless you add the {_locale}
            // parameter in the admin dashboard URL (e.g. '/admin/{_locale}').
            // the name of each locale will be rendered in that locale
            // (in the following example you'll see: "English", "Polski")
            ->setLocales(['en', 'pl'])
            // to customize the labels of locales, pass a key => value array
            // (e.g. to display flags; although it's not a recommended practice,
            // because many languages/locales are not associated to a single country)
            ->setLocales([
                'en' => '🇬🇧 English',
                'pl' => '🇵🇱 Polski',
            ])
            // to further customize the locale option, pass an instance of
            // EasyCorp\Bundle\EasyAdminBundle\Config\Locale
            ->setLocales([
                'en', // locale without custom options
                Locale::new('pl', 'polski', 'far fa-language'), // custom label and icon
            ])
        ;
    }
}
