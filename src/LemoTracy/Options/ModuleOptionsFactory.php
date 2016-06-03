<?php

namespace LemoTracy\Options;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * config key
     */
    const CONFIG_KEY = 'lemo_tracy';

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     * @return ModuleOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');

        return new ModuleOptions(empty($config[$this::CONFIG_KEY]) ? [] : $config[$this::CONFIG_KEY]);
    }

    /**
     * Create an object (v2)
     *
     * @param  ServiceLocatorInterface $container
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, ModuleOptions::class);
    }
}