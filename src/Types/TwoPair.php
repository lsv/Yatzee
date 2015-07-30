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

        $key1 = $keys[0];
        $key2 = $keys[1];
        if (!isset($this->dices['first'])) {
            $this->dices['first'] = $numRoll;
        }

        if (!isset($this->dices[$key1][$key2])) {
            $this->dices[$key1][$key2] = 1;
        } else {
            ++$this->dices[$key1][$key2];
        }

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
        ksort($this->dices);
        $totals = 0;
        foreach ($this->dices as $k1 => $keys) {
            if ($k1 === 'first') {
                continue;
            }
            foreach ($keys as $k2 => $times) {
                $totals += $times;
                $dice = str_repeat(self::getDice($k1), 2);
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
        return 'Two pairs';
    }
}
