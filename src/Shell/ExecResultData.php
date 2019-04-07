<?php

declare(strict_types=1);

namespace Constup\CodeFlow\Shell;

/**
 * Class ExecResultData
 *
 * @package Constup\CodeFlow\Shell
 */
class ExecResultData implements ExecResultDataInterface
{
    /** @var array */
    private $output;
    /** @var int */
    private $return_var;

    /**
     * ExecResultData constructor.
     * @param array $output
     * @param int $return_var
     */
    public function __construct(array $output, int $return_var)
    {
        $this->output = $output;
        $this->return_var = $return_var;
    }

    /**
     * @return array
     */
    public function getOutput(): array
    {
        return $this->output;
    }

    /**
     * @return int
     */
    public function getReturnVar(): int
    {
        return $this->return_var;
    }
}
