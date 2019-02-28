<?php

namespace Lemo\Tracy\Listener;

use Exception;
use Lemo\Tracy\Options\TracyOptions;
use Tracy\Debugger;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

class TracyListener extends AbstractListenerAggregate
{
    /**
     * @var TracyOptions
     */
    protected $tracyOptions;

    /**
     * Constructor
     *
     * @param TracyOptions $tracyOptions
     */
    public function __construct(TracyOptions $tracyOptions)
    {
        $this->tracyOptions = $tracyOptions;
    }

    /**
     * @param  EventManagerInterface $events
     * @param  int                   $priority
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 666): void
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'init'], $priority);
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'error'], $priority);
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER_ERROR, [$this, 'error'], $priority);
    }

    /***
     * @param MvcEvent $event
     */
    public function init(MvcEvent $event): void
    {
        if (true === $this->tracyOptions->getEnabled()) {
            Debugger::enable($this->tracyOptions->getMode());

            if (null !== $this->tracyOptions->getEmail()) {
                Debugger::$email = $this->tracyOptions->getEmail();
            }

            if (null !== $this->tracyOptions->getLogDirectory()) {
                Debugger::$logDirectory = $this->tracyOptions->getLogDirectory();
            }

            if (null !== $this->tracyOptions->getLogSeverity()) {
                Debugger::$logSeverity = $this->tracyOptions->getLogSeverity();
            }

            if (null !== $this->tracyOptions->getMaxDepth()) {
                Debugger::$maxDepth = $this->tracyOptions->getMaxDepth();
            }

            if (null !== $this->tracyOptions->getMaxLength()) {
                Debugger::$maxLength = $this->tracyOptions->getMaxLength();
            }

            if (null !== $this->tracyOptions->getShowBar()) {
                Debugger::$showBar = $this->tracyOptions->getShowBar();
            }

            if (null !== $this->tracyOptions->getShowLocation()) {
                Debugger::$showLocation = $this->tracyOptions->getShowLocation();
            }

            if (null !== $this->tracyOptions->getStrict()) {
                Debugger::$strictMode = $this->tracyOptions->getStrict();
            }
        }
    }

    /***
     * @param  MvcEvent $event
     * @throws Exception
     */
    public function error(MvcEvent $event): void
    {
        if (
            true === $this->tracyOptions->getEnabled()
            && null !== $event->getParam('error')
            && null !== $event->getParam('exception')
        ) {
            ob_clean();

            throw $event->getParam('exception');
        }
    }
}
