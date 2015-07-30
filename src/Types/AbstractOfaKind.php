<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * Do the count for "of a kind" types
 */
namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

/**
 * Class AbstractOfaKind
 * @package Lsv\Yatzee\Types
 */
abstract class AbstractOfaKind extends AbstractType
{
    /**
     * How many of the kind do we need
     *
     * @var int
     */
    protected $ofaKind = 0;

    /**
     * Count the dices
     *
     * @param int   $numRoll
     * @param array $dices
     * @param int   $dicesize
     *
     * @return bool
     */
    public function count($numRoll, array $dices, $dicesize)
    {
        return self::ofaKindCount($numRoll, $dices, $dicesize, $this->ofaKind);
    }

    /**
     * Count the dices
     *
     * @param int $numRoll
     * @param array $dices
     * @param int $dicesize
     * @param int $ofaKind
     *
     * @return bool
     */
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

    /**
     * Get array of data output
     *
     * @param int $rolls
     * @param OutputData $output
     * @param int $ofaKind
     *
     * @return OutputData
     */
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
