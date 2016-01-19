<?php

namespace LemoTracy;

use LemoTracy\Options\ModuleOptions;
use Tracy\Debugger;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    BootstrapListenerInterface,
    ConfigProviderInterface
{
    /**
     * @inheritdoc
     */
    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @inheritdoc
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $event)
    {
        /**
         * @var ModuleOptions $moduleOptions
         */
        $moduleOptions = $event->getTarget()->getServiceManager()->get('LemoTracy\Options\ModuleOptions');

        if (true === $moduleOptions->getEnabled()) {

            if (null !== $moduleOptions->getMode()) {
                Debugger::enable($moduleOptions->getMode());
            }

            if (null !== $moduleOptions->getLogDirectory()) {
                Debugger::$logDirectory = $moduleOptions->getLogDirectory();
            }

            if (null !== $moduleOptions->getLogSeverity()) {
                Debugger::$logSeverity = $moduleOptions->getLogSeverity();
            }

            if (null !== $moduleOptions->getMaxDepth()) {
                Debugger::$maxDepth = $moduleOptions->getMaxDepth();
            }

            if (null !== $moduleOptions->getMaxLen()) {
                Debugger::$maxLen = $moduleOptions->getMaxLen();
            }

            if (null !== $moduleOptions->getShowBar()) {
                Debugger::$showBar = $moduleOptions->getShowBar();
            }

            if (null !== $moduleOptions->getStrict()) {
                Debugger::$strictMode = $moduleOptions->getStrict();
            }
        }
    }
}
