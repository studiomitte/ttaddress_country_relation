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

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setDescription('Migrate tt_address country field');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $service = GeneralUtility::makeInstance(MigrationService::class);
        $count = $service->run();

        $io = new SymfonyStyle($input, $output);
        $io->title($this->getDescription());
        $io->success(sprintf('Migrated %s records!', $count));
    }
}
