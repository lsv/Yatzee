<?php

namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\TypeInterface;

abstract class AbstractType implements TypeInterface
{
    protected $dices;

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

    protected function getValues(array $dices, $dicesize)
    {
        $values = [];
        for ($s = 0; $s <= $dicesize; $s++) {
            $values[$s] = count(array_keys($dices, $s, true));
        }

        return $values;
    }

    protected function writePercent($rolls, $timesHit)
    {
        return sprintf('%01.3f%%', ($timesHit / $rolls) * 100);
    }

    /**
     * Can write data.
     *
     * @return bool
     */
    public function canWrite()
    {
        return isset($this->dices['first']);
    }
}
