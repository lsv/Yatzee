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
 * Counter for full houses.
 */

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

/**
 * Class FullHouse.
 */
class FullHouse extends AbstractType
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
        return $numDices === 5 || $numDices === 6;
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
        if (in_array(3, $valueCount) && in_array(2, $valueCount)) {
            $key1 = array_search(3, $valueCount, true);
            $key2 = array_search(2, $valueCount, true);
            $this->setDices($numRoll, $key1, $key2);

            return true;
        }

        return false;
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
        return $this->writeMultiple(3, 2, $rolls, $output);
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Fullhouse';
    }
}
