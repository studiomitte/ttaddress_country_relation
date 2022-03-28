<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'Country relation for tt_address',
    'description' => 'Use a relation to static_info_tables for the country field',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Georg Ringer',
    'author_email' => 'gr@studiomitte.com',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'tt_address' => '5.3.0-6.99.99',
            'static_info_tables' => '11.5.1-11.5.99',
            'extender' => '8.1.0-8.9.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'classmap' => ['Classes'],
    ],
];
