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
 * Count two pairs.
 */

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

/**
 * Class TwoPair.
 */
class TwoPair extends AbstractType
{
    /**
     * Is it valid to run.
     *
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 4;
    }

    /**
     * Count the values.
     *
     * @param int   $numRoll
     * @param array $dices
     * @param int   $dicesize
     *
     * @return bool
     */
    public function count($numRoll, array $dices, $dicesize)
    {
        $valueCount = self::getValues($dices, $dicesize);
        $keys = array_keys($valueCount, 2, true);
        if (count($keys) !== 2) {
            return false;
        }

        $this->setDices($numRoll, $keys[0], $keys[1]);

        return true;
    }

    /**
     * Get array of data output.
     *
     * @param int        $rolls
     * @param OutputData $output
     *
     * @return OutputData
     */
    public function write($rolls, OutputData $output)
    {
        return $this->writeMultiple(2, 2, $rolls, $output);
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Two pairs';
    }
}
