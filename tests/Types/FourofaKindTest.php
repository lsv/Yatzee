<?php

namespace Lsv\Yatzeetests\Types;

use Lsv\Yatzee\TypeInterface;
use Lsv\Yatzee\Types\FourOfaKind;

class FourofaKindTest extends AbstractOfaKindTest
{
    /**
     * @return array
     */
    public function validProvider()
    {
        return [
            [1, false],
            [2, false],
            [3, false],
            [4, true],
            [5, true],
            [6, true],
            [7, true],
            [8, true],
        ];
    }

    /**
     * @return array
     */
    public function diceProvider()
    {
        return [
            [[1,1,1,1], true, [str_repeat($this->getDice(1), 4), 1, '100.000%']],
            [[2,2,2,1], false, []],
            [[2,2,2,2], true, [str_repeat($this->getDice(2), 4), 1, '100.000%']],
            [[3,3,3,3,2,1,5,6], true, [str_repeat($this->getDice(3), 4), 1, '100.000%']],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new FourOfaKind();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Four of a Kind';
    }
}
