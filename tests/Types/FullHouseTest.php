<?php

namespace Lsv\Yatzeetests\Types;

use Lsv\Yatzee\TypeInterface;
use Lsv\Yatzee\Types\FullHouse;

class FullHouseTest extends AbstractOfaKindTest
{
    public function validProvider()
    {
        return [
            [1, false],
            [2, false],
            [3, false],
            [4, false],
            [5, true],
            [6, true],
            [7, false],
            [8, false],
        ];
    }

    private function writeDice($first, $second)
    {
        return sprintf('%s%s', str_repeat($this->getDice($first), 3), str_repeat($this->getDice($second), 2));
    }

    public function diceProvider()
    {
        return [
            [[1,1,1,2,2,3], true, [$this->writeDice(1, 2), 1, '100.000%']],
            [[2,2,2,3,3,4], true, [$this->writeDice(2, 3), 1, '100.000%']],
            [[2,2,1,1,1,3], true, [$this->writeDice(1, 2), 1, '100.000%']],
            [[1,2,2,3,4], false, []],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new FullHouse();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Fullhouse';
    }
}
