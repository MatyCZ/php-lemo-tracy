<?php

namespace Lemo\Tracy;

return [
    'service_manager' => [
        'factories' => [
            Listener\TracyListener::class => Listener\TracyListenerFactory::class,
            Options\TracyOptions::class  => Options\TracyOptionsFactory::class,
        ]
    ],
];
