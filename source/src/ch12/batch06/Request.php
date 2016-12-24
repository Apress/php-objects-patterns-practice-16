<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

abstract class Request
{
    protected $properties;
    protected $feedback = [];
    protected $path = "/";
    protected $cmdstatus = 0;

    public function __construct()
    {
        $this->init();
    }

    abstract public function init();

    abstract public function forward(string $path);

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setCmdStatus(int $status)
    {
        $this->cmdstatus = $status;
    }

    public function getCmdStatus(): int
    {
        return $this->cmdstatus;
    }


    public function getProperty(string $key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty(string $key, $val)
    {
        $this->properties[$key] = $val;
    }

    public function addFeedback(string $msg)
    {
        array_push($this->feedback, $msg);
    }

    public function getFeedback(): array
    {
        return $this->feedback;
    }

    public function getFeedbackString($separator = "\n"): string
    {
        return implode($separator, $this->feedback);
    }

    public function clearFeedback()
    {
        $this->feedback = [];
    }
}
