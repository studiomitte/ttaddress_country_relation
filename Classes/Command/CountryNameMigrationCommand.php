<?php

declare(strict_types=1);

namespace StudioMitte\TtaddressCountryRelation\Command;

use StudioMitte\TtaddressCountryRelation\Migration\MigrationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CountryNameMigrationCommand extends Command
{
    protected function configure(): void
    {
        $this->setDescription('Migrate tt_address country field');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $service = GeneralUtility::makeInstance(MigrationService::class);
        $count = $service->run();

        $io = new SymfonyStyle($input, $output);
        $io->title($this->getDescription());
        $io->success(sprintf('Migrated %s records!', $count));

        return Command::SUCCESS;
    }
}
