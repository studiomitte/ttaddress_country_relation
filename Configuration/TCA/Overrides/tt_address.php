<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {

        $fields = [
            'country_relation' => [
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.country',
                'config' => [
                    'size' => 1,
                    'default' => 0.
                    'minitems' => 0,
                    'maxitems' => 1,
                    'type' => 'group',
                    'internal_type' => 'db',
                    'allowed' => 'static_countries',
                    'foreign_table' => 'static_countries',
                    'suggestOptions' => [
                        'default' => [
                            'pidList' => '0',
                            'additionalSearchFields' => 'cn_short_de'
                        ]
                    ],
                    'fieldWizard' => [
                        'recordsOverview' => [
                            'disabled' => true
                        ],
                        'tableList' => [
                            'disabled' => true
                        ]
                    ],
                ],
            ]
        ];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $fields);
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', 'country_relation', '', 'after:region');
    },
    'ttaddress_country_relation'
);
