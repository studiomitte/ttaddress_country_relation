<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Country relation for tt_address',
    'description' => 'Use a relation to static_info_tables for the country field',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Georg Ringer',
    'author_email' => 'gr@studiomitte.com',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.9-9.5.99',
            'tt_address' => '5.0.0-6.9.99',
            'static_info_tables' => '6.7.5-6.9.99',
            'extender' => '6.6.1-6.6.99',
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
