<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'moneyiq' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=moneyiq.jp;dbname=moneyiq',
                    'user'       => 'moneyiqadmin',
                    'password'   => 'ShowM3Th3Mon3y',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'moneyiq',
            'connections' => ['moneyiq']
        ],
        'generator' => [
            'defaultConnection' => 'moneyiq',
            'connections' => ['moneyiq']
        ]
    ]
];

?>