<?php

namespace App\Infrastructure\Command;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Entity\Styles\GlobalStyles;
use App\Infrastructure\Repository\Page\PageRepository;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetGlobalStylesForAllPagesCommand extends Command
{
    public function __construct(
        private readonly PageRepository $pageRepository,
        private readonly GlobalStylesRepository $globalStylesRepository,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:set-global-styles-for-all-pages')
            ->setDescription('Ustawienie domyślnych stylów dla wszystkich stron');
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Skanowanie stron');

        /**
         * @var Page $page
         */
        $pages = $this->pageRepository->findAll();
        /**
         * @var GlobalStyles $style
         */
        $styles = $this->globalStylesRepository->findAll();

        foreach ($styles as $style) {
            $output->writeln("Wyszukiwanie styli...");
            $output->writeln(sprintf("%s %s", 'Znaleziono style o nazwie', $style->getName()));

            foreach ($pages as $page) {
                $page->setGlobalStyles($style);
                $this->pageRepository->update($page);

                $output->writeln(sprintf("%s %s", 'Ustawiono style dla strony', $page->getPageName()));
            }
        }
        $output->writeln("Ukończono podpinanie styli");

        return Command::SUCCESS;
    }
}
