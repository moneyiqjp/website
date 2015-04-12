<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'moneyiq' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=moneyiq',
                    'user'       => 'root',
                    'password'   => '',
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