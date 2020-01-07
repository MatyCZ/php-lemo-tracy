<?php

namespace Lemo\Tracy;

use Laminas\EventManager\EventInterface;
use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\ServiceManager\ServiceManager;
use Lemo\Tracy\Listener\TracyListener;

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
