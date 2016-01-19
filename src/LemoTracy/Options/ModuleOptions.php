<?php

namespace LemoTracy\Options;

use LemoTracy\Exception\InvalidArgumentException;
use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * @var string|null
     */
    protected $logDirectory;

    /**
     * @var int
     */
    protected $logSeverity;

    /**
     * @var int
     */
    protected $maxDepth;

    /**
     * @var int
     */
    protected $maxLen;

    /**
     * @var bool|null
     */
    protected $mode;

    /**
     * @var bool
     */
    protected $showBar;

    /**
     * @var bool
     */
    protected $strict;

    /**
     * Enable debugger
     *
     * @param  bool $enabled
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (bool) $enabled;

        return $this;
    }

    /**
     * Is debugger enabled?
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Path to log directory
     *
     * @param  string $path
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setLogDirectory($path)
    {
        if (!is_dir($path)) {
            throw new InvalidArgumentException(sprintf("Path '%s' does`t exists", $path));
        }

        $this->logDirectory = realpath($path);

        return $this;
    }

    /**
     * Empty string to disable, null for default
     *
     * @return string
     */
    public function getLogDirectory()
    {
        return $this->logDirectory;
    }

    /**
     * Set log severity in production mode for showing bluescreen
     *
     * @param  int $logSeverity
     * @return $this
     */
    public function setLogSeverity($logSeverity)
    {
        $this->logSeverity = $logSeverity;

        return $this;
    }

    /**
     * Get log severity
     *
     * @return int
     */
    public function getLogSeverity()
    {
        return $this->logSeverity;
    }

    /**
     * Set email address to sending exceptions
     *
     * @param  string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = (string) $email;

        return $this;
    }

    /**
     * Get email address to sending exceptions
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set max depth of variable dump
     *
     * @param  int $maxDepth
     * @return $this
     */
    public function setMaxDepth($maxDepth)
    {
        $this->maxDepth = (int) $maxDepth;

        return $this;
    }

    /**
     * Get max depth of variable dump
     *
     * @return int
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    /**
     * Set maximum length of a variable dump
     *
     * @param  int $maxLen
     * @return $this
     */
    public function setMaxLen($maxLen)
    {
        $this->maxLen = (int) $maxLen;

        return $this;
    }

    /**
     * Get maximum length of a variable dump
     *
     * @return int
     */
    public function getMaxLen()
    {
        return $this->maxLen;
    }

    /**
     * Set debugger mode
     *
     * true  = production
     * false = development
     * null  = autodetect|IP address(es) csv/array
     *
     * @param  bool|null $mode
     * @return $this
     */
    public function setMode($mode)
    {
        $this->mode = (null === $mode ? null : (bool) $mode);

        return $this;
    }

    /**
     * Get debugger mode
     *
     * @return bool|null
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param  bool $showBar
     * @return $this
     */
    public function setShowBar($showBar)
    {
        $this->showBar = (bool) $showBar;

        return $this;
    }

    /**
     * @return bool
     */
    public function getShowBar()
    {
        return $this->showBar;
    }

    /**
     * Strict errors?
     *
     * @param  bool $strict
     * @return $this
     */
    public function setStrict($strict)
    {
        $this->strict = (bool) $strict;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStrict()
    {
        return $this->strict;
    }
}