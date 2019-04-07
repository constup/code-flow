<?php

declare(strict_types=1);

namespace Constup\CodeFlow\Message;

/**
 * Class GenericFlowMessage
 *
 * @package Constup\CodeFlow\Message
 */
class GenericFlowMessage implements GenericFlowMessageInterface
{
    /** @var bool */
    private $success;
    /** @var bool */
    private $exception = false;
    /** @var object */
    private $exception_object = null;
    /** @var string */
    private $code;
    /** @var string */
    private $message = '';
    /** @var string */
    private $log_level;
    /** @var bool */
    private $capture_stack_trace;
    /** @var string string */
    private $stack_trace = '';

    /**
     * GenericFlowMessage constructor.
     * @param bool $success
     * @param bool $exception
     * @param object $exception_object
     * @param string $code
     * @param string $message
     * @param string $log_level
     * @param bool $capture_stack_trace
     */
    public function __construct(bool $success, bool $exception, object $exception_object, string $code, string $message, string $log_level, bool $capture_stack_trace)
    {
        $this->success = $success;
        $this->exception = $exception;
        $this->exception_object = $exception_object;
        $this->code = $code;
        $this->message = $message;
        $this->log_level = $log_level;
        $this->capture_stack_trace = $capture_stack_trace;
        if ($capture_stack_trace === true) {
            $this->stack_trace = $this->init_stack_trace();
        }
    }

    /**
     * @return string
     */
    private function init_stack_trace(): string
    {
        ob_start();
        debug_print_backtrace();
        $trace = ob_get_contents();
        ob_end_clean();

        $trace = preg_replace ('/^#0\s+' . __FUNCTION__ . "[^\n]*\n/", '', $trace, 1);
        $trace = preg_replace ('/^#(\d+)/me', '\'#\' . ($1 - 1)', $trace);

        return $trace;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return bool
     */
    public function isException(): bool
    {
        return $this->exception;
    }

    /**
     * @return object
     */
    public function getExceptionObject(): object
    {
        return $this->exception_object;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getLogLevel(): string
    {
        return $this->log_level;
    }

    /**
     * @return bool
     */
    public function isCaptureStackTrace(): bool
    {
        return $this->capture_stack_trace;
    }

    /**
     * @return string
     */
    public function getStackTrace(): string
    {
        return $this->stack_trace;
    }
}
