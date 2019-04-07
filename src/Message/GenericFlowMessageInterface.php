<?php

namespace Constup\CodeFlow\Message;


/**
 * Class GenericFlowMessage
 *
 * @package Constup\CodeFlow\Message
 */
interface GenericFlowMessageInterface
{
    /**
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * @return bool
     */
    public function isException(): bool;

    /**
     * @return object
     */
    public function getExceptionObject(): object;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @return string
     */
    public function getLogLevel(): string;

    /**
     * @return string
     */
    public function getStackTrace(): string;
}