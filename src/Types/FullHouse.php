<?php

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

class FullHouse extends AbstractType
{
    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices === 5 || $numDices === 6;
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
        if (in_array(3, $valueCount) && in_array(2, $valueCount)) {
            if (!isset($this->dices['first'])) {
                $this->dices['first'] = $numRoll;
            }

            $key1 = array_search(3, $valueCount, true);
            $key2 = array_search(2, $valueCount, true);

            if (!isset($this->dices[$key1][$key2])) {
                $this->dices[$key1][$key2] = 1;
            } else {
                ++$this->dices[$key1][$key2];
            }

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
        ksort($this->dices);
        $totals = 0;
        foreach ($this->dices as $k1 => $keys) {
            if ($k1 === 'first') {
                continue;
            }
            foreach ($keys as $k2 => $times) {
                $totals += $times;
                $dice = str_repeat(self::getDice($k1), 3);
                $dice .= str_repeat(self::getDice($k2), 2);
                $output->addRow([$dice, $times, $this->writePercent($rolls, $times)]);
            }
        }

        $output->setFirst($this->dices['first']);
        $output->setTotalPercent($this->writePercent($rolls, $totals));
        $output->setTotal($totals);

        return $output;
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
