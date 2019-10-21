<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {

        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_address']['extender'][\FriendsOfTYPO3\TtAddress\Domain\Model\Address::class][$extKey]
            = 'EXT:ttaddress_country_relation/Classes/Domain/Model/Address.php';
    },
    'ttaddress_country_relation'
);
