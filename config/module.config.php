<?php

namespace Lemo\Tracy;

return [
    'service_manager' => [
        'invokables' => [
            Listener\TracyListener::class => Listener\TracyListener::class,
        ],
        'factories' => [
            Options\TracyOptions::class  => Options\TracyOptionsFactory::class,
        ]
    ],
];
