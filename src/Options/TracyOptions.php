<?php

namespace Lemo\Tracy\Options;

use Laminas\Stdlib\AbstractOptions;
use Lemo\Tracy\Exception\InvalidArgumentException;

class TracyOptions extends AbstractOptions
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
    protected $maxDepth = 3;

    /**
     * @var int
     */
    protected $maxLength = 150;

    /**
     * @var bool|null
     */
    protected $mode;

    /**
     * @var bool
     */
    protected $showBar = true;

    /**
     * @var bool
     */
    protected $showLocation = false;

    /**
     * @var bool
     */
    protected $strict = false;

    /**
     * Is debugger enabled?
     *
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Enable debugger
     *
     * @param  bool $enabled
     * @return self
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Empty string to disable, null for default
     *
     * @return string
     */
    public function getLogDirectory(): ?string
    {
        return $this->logDirectory;
    }

    /**
     * Path to log directory
     *
     * @param  string $path
     * @throws InvalidArgumentException
     * @return self
     */
    public function setLogDirectory(?string $path): self
    {
        if (null !== $path) {
            if (!is_dir($path)) {
                throw new InvalidArgumentException(sprintf(
                    "Tracy log path '%s' does`t exists",
                    $path
                ));
            }

            $path = realpath($path);
        }

        $this->logDirectory = $path;
        return $this;
    }

    /**
     * Get log severity
     *
     * @return int
     */
    public function getLogSeverity(): ?int
    {
        return $this->logSeverity;
    }

    /**
     * Set log severity in production mode for showing bluescreen
     *
     * @param  int $logSeverity
     * @return self
     */
    public function setLogSeverity(?int $logSeverity): self
    {
        $this->logSeverity = $logSeverity;
        return $this;
    }

    /**
     * Get email address to sending exceptions
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set email address to sending exceptions
     *
     * @param  string $email
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get max depth of variable dump
     *
     * @return int
     */
    public function getMaxDepth(): int
    {
        return $this->maxDepth;
    }

    /**
     * Set max depth of variable dump
     *
     * @param  int $maxDepth
     * @return self
     */
    public function setMaxDepth(int $maxDepth): self
    {
        $this->maxDepth = $maxDepth;
        return $this;
    }

    /**
     * Get maximum length of a variable dump
     *
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * Set maximum length of a variable dump
     *
     * @param  int $maxLength
     * @return self
     */
    public function setMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    /**
     * Get debugger mode
     *
     * @return bool|null
     */
    public function getMode(): ?bool
    {
        return $this->mode;
    }

    /**
     * Set debugger mode
     *
     * true  = production
     * false = development
     * null  = autodetect|IP address(es) csv/array
     *
     * @param  bool|null $mode
     * @return self
     */
    public function setMode(?bool $mode): self
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return bool
     */
    public function getShowBar(): bool
    {
        return $this->showBar;
    }

    /**
     * @param  bool $showBar
     * @return self
     */
    public function setShowBar(bool $showBar): self
    {
        $this->showBar = $showBar;
        return $this;
    }

    /**
     * @return bool
     */
    public function getShowLocation(): bool
    {
        return $this->showLocation;
    }

    /**
     * @param  bool $showLocation
     * @return self
     */
    public function setShowLocation(bool $showLocation): self
    {
        $this->showLocation = $showLocation;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStrict(): bool
    {
        return $this->strict;
    }

    /**
     * Strict errors?
     *
     * @param  bool $strict
     * @return self
     */
    public function setStrict(bool $strict): self
    {
        $this->strict = $strict;
        return $this;
    }
}