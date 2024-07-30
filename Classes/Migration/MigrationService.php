<?php

declare(strict_types=1);

namespace StudioMitte\TtaddressCountryRelation\Migration;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\EndTimeRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\HiddenRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\StartTimeRestriction;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MigrationService
{
    public function run(): int
    {
        $count = 0;

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_address');
        $queryBuilder->getRestrictions()
            ->removeByType(HiddenRestriction::class)
            ->removeByType(StartTimeRestriction::class)
            ->removeByType(EndTimeRestriction::class);

        $rows = $queryBuilder
            ->select('uid', 'country')
            ->from('tt_address')
            ->where(
                $queryBuilder->expr()->eq('country_relation', $queryBuilder->createNamedParameter(0, \PDO::PARAM_INT)),
                $queryBuilder->expr()->neq('country', $queryBuilder->createNamedParameter('', \PDO::PARAM_STR)),
            )
            ->execute()
            ->fetchAll();

        foreach ($rows as $row) {
            if ($this->updateSingleRow($row['country'], $row['uid'])) {
                $count++;
            }
        }

        return $count;
    }

    protected function updateSingleRow(string $countryName, int $addressUid): bool
    {
        $staticCountryId = $this->getStaticCountryRow($countryName);
        if (!$staticCountryId) {
            return false;
        }

        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tt_address');
        $connection->update(
            'tt_address',
            [
                'country_relation' => $staticCountryId,
            ],
            [
                'uid' => $addressUid,
            ]
        );

        return true;
    }

    protected function getStaticCountryRow(string $countryName): int
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('static_countries');
        $row = $queryBuilder
            ->select('*')
            ->from('static_countries')
            ->where(
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->eq('cn_short_local', $queryBuilder->createNamedParameter($countryName, \PDO::PARAM_STR)),
                    $queryBuilder->expr()->eq('cn_short_en', $queryBuilder->createNamedParameter($countryName, \PDO::PARAM_STR)),
                    $queryBuilder->expr()->eq('cn_official_name_en', $queryBuilder->createNamedParameter($countryName, \PDO::PARAM_STR)),
                    $queryBuilder->expr()->eq('cn_iso_2', $queryBuilder->createNamedParameter($countryName, \PDO::PARAM_STR)),
                    $queryBuilder->expr()->eq('cn_iso_3', $queryBuilder->createNamedParameter($countryName, \PDO::PARAM_STR))
                )
            )
            ->setMaxResults(1)
            ->execute()
            ->fetch();

        if ($row) {
            return (int)$row['uid'];
        }

        return 0;
    }
}
