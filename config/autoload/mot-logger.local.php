<?php

return [
    'mot_logger' => [
        'loggers' => [
            'mot_google_analytics' => [
                'channel' => 'mot_google_analytics',
                'writers' => [
                    [
                        'type' => 'stream',
                        'path' => 'php://stderr',
                        'formatter' => 'pipe',
                        'level' => 'error',
                        'enabled' => true,
                    ],
                ],
            ],
        ],
    ],
];
