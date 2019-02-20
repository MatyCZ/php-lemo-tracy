<?php

namespace LemoTracy\Listener;

use Interop\Container\ContainerInterface;
use Lemo\Tracy\Listener\TracyListener;
use Lemo\Tracy\Options\TracyOptions;
use Zend\ServiceManager\Factory\FactoryInterface;

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