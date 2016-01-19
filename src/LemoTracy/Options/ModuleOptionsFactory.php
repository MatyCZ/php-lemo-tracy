<?php

namespace LemoTracy\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * config key
     */
    const CONFIG_KEY = 'lemo_tracy';

    /**
     * @param  ServiceLocatorInterface $services
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('Config');

        return new ModuleOptions(empty($config[$this::CONFIG_KEY]) ? [] : $config[$this::CONFIG_KEY]);
    }
}