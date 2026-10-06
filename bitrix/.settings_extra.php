<?php
return [
    'loggers' => [
        'value' => [
            'otus.logger' => [
                'constructor' => function () {
                    return new \Otus\Logger(
                        $_SERVER['DOCUMENT_ROOT'] . '/local/logs/otus.log',
                        5_000_000
                    );
                },
            ],
        ],
        'readonly' => true,
    ],
];
