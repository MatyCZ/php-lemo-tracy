<?php

namespace Lemo\Tracy\Options;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class TracyOptionsFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): TracyOptions
    {
        $config = $container->get('config');

        return new TracyOptions(
            $config['tracy'] ?: []
        );
    }
}