<?php

declare(strict_types = 1);

namespace Constup\CodeFlow\Display\Symfony4\Command;

use Constup\CodeFlow\Message\GenericFlowMessageInterface;

/**
 * Class ErrorPrinter
 *
 * @package Constup\CodeFlow\Display\Symfony4\Command
 */
interface ErrorPrinterInterface
{
    /**
     * @return GenericFlowMessageInterface
     */
    public function getGenericFlowMessage(): GenericFlowMessageInterface;

    /**
     * @param string $fg_color
     * @param string $bg_color
     *
     * @return string
     */
    public function printErrorCodeAndMessage(string $fg_color = '', string $bg_color = ''): string;
}
