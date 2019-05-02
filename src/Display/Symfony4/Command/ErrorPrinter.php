<?php

declare(strict_types = 1);

namespace Constup\CodeFlow\Display\Symfony4\Command;

use Constup\CodeFlow\Message\GenericFlowMessageInterface;

/**
 * Class ErrorPrinter
 *
 * @package Constup\CodeFlow\Display\Symfony4\Command
 */
class ErrorPrinter implements ErrorPrinterInterface
{
    /** @var GenericFlowMessageInterface */
    private $generic_flow_message;

    /**
     * ErrorPrinter constructor.
     *
     * @param GenericFlowMessageInterface $generic_flow_message
     */
    public function __construct(GenericFlowMessageInterface $generic_flow_message)
    {
        $this->generic_flow_message = $generic_flow_message;
    }

    /**
     * @return GenericFlowMessageInterface
     */
    public function getGenericFlowMessage(): GenericFlowMessageInterface
    {
        return $this->generic_flow_message;
    }

    /**
     * @param string $fg_color
     * @param string $bg_color
     *
     * @return string
     */
    public function printErrorCodeAndMessage(string $fg_color = '', string $bg_color = ''): string
    {
        $result = $this->applyColors($fg_color, $bg_color);

        $result .= 'Error: ' . $this->getGenericFlowMessage()->getCode() . PHP_EOL;
        $result .= 'Message: ' . $this->getGenericFlowMessage()->getMessage() . PHP_EOL . PHP_EOL;

        $result .= $this->applyStyleCloseTag(!empty($fg_color) || !empty($bg_color));

        return $result;
    }

    /**
     * @param string $fg_color
     * @param string $bg_color
     *
     * @return string
     */
    private function applyColors(string $fg_color, string $bg_color): string
    {
        $result = '';
        if (!empty($fg_color) || !empty($bg_color)) {
            $result = '<';
            if (!empty($fg_color)) {
                $result .= 'fg=' . $fg_color;
                if (!empty($bg_color)) {
                    $result .= ';';
                }
            }
            if (!empty($bg_color)) {
                $result .= 'bg=' . $bg_color;
            }
            $result .= '>';
        }

        return $result;
    }

    /**
     * @param bool $should_close
     *
     * @return string
     */
    private function applyStyleCloseTag(bool $should_close): string
    {
        return $should_close ? '</>' : '';
    }
}
