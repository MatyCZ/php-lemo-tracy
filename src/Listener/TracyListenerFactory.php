<?php

namespace Lemo\Tracy\Listener;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Lemo\Tracy\Options\TracyOptions;

class TracyListenerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): TracyListener
    {
        return new TracyListener(
            $container->get(TracyOptions::class)
        );
    }
}