<?php

namespace App\Infrastructure\Admin;

use App\Infrastructure\Entity\Page\Banner;
use App\Infrastructure\Entity\Page\Category;
use App\Infrastructure\Entity\Page\Contact;
use App\Infrastructure\Entity\Page\Gallery;
use App\Infrastructure\Entity\Page\Image;
use App\Infrastructure\Entity\Page\Logo;
use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Entity\Page\PageHeader;
use App\Infrastructure\Entity\Page\Project;
use App\Infrastructure\Entity\Page\ProjectDetail;
use App\Infrastructure\Entity\Page\SocialMediaLinkIcons;
use App\Infrastructure\Entity\Page\Tag;
use App\Infrastructure\Entity\User\User;
use App\Infrastructure\Repository\Page\ContactRepository;
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
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        parent::index();

        $newMessagesCount = $this->contactRepository->countUnansweredContacts();

        return $this->render('admin/dashboard/dashboard.html.twig', [
            'new_messages_count' => $newMessagesCount
        ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Kokpit', 'fa fa-home');

        yield MenuItem::section('Kreator stron');
        yield MenuItem::linkToCrud('Strony', 'fa-solid fa-file-alt', Page::class);

        yield MenuItem::section('Zarządzanie');
        yield MenuItem::subMenu('Zarządzanie użytkownikami', 'fa-solid fa-users')
            ->setSubItems([
                MenuItem::linkToCrud('Użytkownik', 'fa-solid fa-user', User::class),
            ]);

        yield MenuItem::subMenu('Zarządzanie treścią', 'fa-solid fa-edit')
            ->setSubItems([
                MenuItem::section('Baner & logo'),
                MenuItem::linkToCrud('Banery', 'fa-solid fa-image', Banner::class),
                MenuItem::linkToCrud('Logo', 'fa-solid fa-flag', Logo::class),

                MenuItem::section('Zawartość strony'),
                MenuItem::linkToCrud('Media społecznościowe', 'fa fa-share-alt', SocialMediaLinkIcons::class),
                MenuItem::linkToCrud('Menu', 'fa fa-list-ul', \App\Infrastructure\Entity\Page\MenuItem::class),
                MenuItem::linkToCrud('Nagłówki', 'fa fa-heading', PageHeader::class),

                MenuItem::section('Galeria zdjęć'),
                MenuItem::linkToCrud('Galerie', 'fas fa-images', Gallery::class),
                MenuItem::linkToCrud('Zdjęcia', 'fas fa-image', Image::class),

                MenuItem::section('Projekty'),
                MenuItem::linkToCrud('Projects', 'fas fa-list', Project::class),
                MenuItem::linkToCrud('Project Details', 'fas fa-list', ProjectDetail::class),

                MenuItem::section('Tagi i kategorie'),
                MenuItem::linkToCrud('Kategorie', 'fas fa-tags', Category::class),
                MenuItem::linkToCrud('Tagi', 'fas fa-tag', Tag::class)
            ]);

        yield MenuItem::section('Administracja');
        yield MenuItem::subMenu('Zapytania', 'fa-solid fa-envelope')
            ->setSubItems([
                MenuItem::linkToCrud('Wiadomości', 'fa-solid fa-message', Contact::class),
            ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Administracja zawartością witryn')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('Administracja <span class="text-small">zawartością witryn.</span>')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

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
                'pl' => '🇵🇱 Polski'
            ])
            // to further customize the locale option, pass an instance of
            // EasyCorp\Bundle\EasyAdminBundle\Config\Locale
            ->setLocales([
                'en', // locale without custom options
                Locale::new('pl', 'polski', 'far fa-language') // custom label and icon
            ])
            ;
    }
}
