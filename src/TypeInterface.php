<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

/**
 * Interface for yatzee types.
 */

namespace Lsv\Yatzee;

/**
 * Interface TypeInterface.
 */
interface TypeInterface
{
    /**
     * Is it valid to run.
     *
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices);

    /**
     * Count the values.
     *
     * @param int   $numRoll
     * @param array $dices
     * @param int   $dicesize
     *
     * @return bool
     */
    public function count($numRoll, array $dices, $dicesize);

    /**
     * Get array of data output.
     *
     * @param int        $rolls
     * @param OutputData $output
     *
     * @return OutputData
     */
    public function write($rolls, OutputData $output);

    /**
     * Can write data.
     *
     * @return bool
     */
    public function canWrite();

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName();
}
