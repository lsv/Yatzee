<?php

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

abstract class AbstractOfaKind extends AbstractType
{
    protected $ofaKind = 0;

    /**
     * @param int $numRoll
     * @param array $dices
     *
     * @param int $dicesize
     * @return bool
     */
    public function count($numRoll, array $dices, $dicesize)
    {
        return self::ofaKindCount($numRoll, $dices, $dicesize, $this->ofaKind);
    }

    protected function ofaKindCount($numRoll, array $dices, $dicesize, $ofaKind)
    {
        $valueCount = self::getValues($dices, $dicesize);
        if (in_array($ofaKind, $valueCount, true)) {
            if (!isset($this->dices['first'])) {
                $this->dices['first'] = $numRoll;
            }

            $key = array_search($ofaKind, $valueCount, true);
            if (!isset($this->dices[$key])) {
                $this->dices[$key] = 1;
            } else {
                ++$this->dices[$key];
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
        return self::ofaKindWrite($rolls, $output, $this->ofaKind);
    }

    protected function ofaKindWrite($rolls, OutputData $output, $ofaKind)
    {
        ksort($this->dices);
        $totals = 0;
        foreach ($this->dices as $k => $num) {
            if ($k === 'first') {
                continue;
            }
            $totals += $num;
            $output->addRow([str_repeat(self::getDice($k), $ofaKind), $num, $this->writePercent($rolls, $num)]);
        }

        $output->setFirst($this->dices['first']);
        $output->setTotal($totals);
        $output->setTotalPercent($this->writePercent($rolls, $totals));

        return $output;
    }
}
