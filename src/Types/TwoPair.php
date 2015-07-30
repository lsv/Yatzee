<?php

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

class TwoPair extends AbstractType
{
    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 4;
    }

    /**
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
