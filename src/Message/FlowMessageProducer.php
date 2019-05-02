<?php

declare(strict_types = 1);

namespace Constup\CodeFlow\Message;

use Psr\Log\LogLevel;

/**
 * Class FlowMessageProducer
 *
 * @package Constup\CodeFlow\Message
 */
class FlowMessageProducer
{
    /**
     * @return GenericFlowMessageInterface
     */
    public static function produceEmptySuccess(): GenericFlowMessageInterface
    {
        return new GenericFlowMessage(true, false, null, 'SUCCESS', '', LogLevel::INFO, false, null);
    }
}