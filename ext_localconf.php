<?php

declare(strict_types=1);
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    static function ($extKey): void {
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['tt_address']['extender'][
       \FriendsOfTYPO3\TtAddress\Domain\Model\Address::class
        ][$extKey] = 'EXT:'. $extKey . '/Classes/Extending/Domain/Model/Address.php';
//        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extKey]['extender'][\FriendsOfTYPO3\TtAddress\Domain\Model\Address::class][$extKey] = 'Domain/Model/Address';
    },
    'ttaddress_country_relation'
);
