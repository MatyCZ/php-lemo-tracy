<?php

namespace Lemo\Tracy;

use Lemo\Tracy\Listener\TracyListener;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface
{
    /**
     * @inheritdoc
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $event)
    {
        /**
         * @var MvcEvent       $event
         * @var ServiceManager $serviceManager
         */
        $eventManager = $event->getApplication()->getEventManager();
        $serviceManager = $event->getApplication()->getServiceManager();

        // Attach listener
        $tracyListener = $serviceManager->get(TracyListener::class);
        $tracyListener->attach($eventManager);
    }
}
