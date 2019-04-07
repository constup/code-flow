<?php

namespace Constup\CodeFlow\Shell;


/**
 * Class ExecResultData
 *
 * @package Constup\CodeFlow\Shell
 */
interface ExecResultDataInterface
{
    /**
     * @return array
     */
    public function getOutput(): array;

    /**
     * @return int
     */
    public function getReturnVar(): int;
}