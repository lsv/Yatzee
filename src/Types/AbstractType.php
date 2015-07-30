<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * Methods for types
 */
namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;
use Lsv\Yatzee\TypeInterface;

/**
 * Class AbstractType
 * @package Lsv\Yatzee\Types
 */
abstract class AbstractType implements TypeInterface
{
    /**
     * Dice values
     *
     * @var array
     */
    protected $dices;

    /**
     * Can write data.
     *
     * @return bool
     */
    public function canWrite()
    {
        return isset($this->dices['first']);
    }

    /**
     * Get nice dices
     *
     * @param int $dice
     *
     * @return string
     */
    protected function getDice($dice)
    {
        switch ($dice) {
            case 1:
                return '⚀';
            case 2:
                return '⚁';
            case 3:
                return '⚂';
            case 4:
                return '⚃';
            case 5:
                return '⚄';
            case 6:
                return '⚅';
            default:
                return $dice;
        }
    }

    /**
     * Transform dices to values
     *
     * @param array $dices
     * @param int $dicesize
     * @return array
     */
    protected function getValues(array $dices, $dicesize)
    {
        $values = [];
        for ($s = 0; $s <= $dicesize; $s++) {
            $values[$s] = count(array_keys($dices, $s, true));
        }

        return $values;
    }

    /**
     * Write percent
     *
     * @param int $rolls
     * @param int $timesHit
     * @return string
     */
    protected function writePercent($rolls, $timesHit)
    {
        return sprintf('%01.3f%%', ($timesHit / $rolls) * 100);
    }

    /**
     * Calculate dice array
     *
     * @param int $roll
     * @param mixed $key1
     * @param mixed $key2
     */
    protected function setDices($roll, $key1, $key2)
    {
        if (!isset($this->dices['first'])) {
            $this->dices['first'] = $roll;
        }

        if (!isset($this->dices[$key1][$key2])) {
            $this->dices[$key1][$key2] = 1;
        } else {
            ++$this->dices[$key1][$key2];
        }
    }

    /**
     * Write for multiple dice sizes
     *
     * @param int $size1
     * @param int $size2
     * @param int $rolls
     * @param OutputData $output
     * @return OutputData
     */
    protected function writeMultiple($size1, $size2, $rolls, OutputData $output)
    {
        ksort($this->dices);
        $totals = 0;
        foreach ($this->dices as $k1 => $keys) {
            if ($k1 === 'first') {
                continue;
            }
            foreach ($keys as $k2 => $times) {
                $totals += $times;
                $dice = str_repeat(self::getDice($k1), $size1);
                $dice .= str_repeat(self::getDice($k2), $size2);
                $output->addRow([$dice, $times, $this->writePercent($rolls, $times)]);
            }
        }

        $output->setFirst($this->dices['first']);
        $output->setTotalPercent($this->writePercent($rolls, $totals));
        $output->setTotal($totals);

        return $output;
    }
}
