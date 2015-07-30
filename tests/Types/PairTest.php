<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Lsv\Yatzeetests\Types;

use Lsv\Yatzee\TypeInterface;
use Lsv\Yatzee\Types\Pair;

class PairTest extends AbstractOfaKindTest
{
    public function validProvider()
    {
        return [
            [1, false],
            [2, true],
            [3, true],
            [4, true],
            [5, true],
            [6, true],
            [7, true],
            [8, true],
        ];
    }

    public function diceProvider()
    {
        return [
            [[1,1,2,3,4], true, [str_repeat($this->getDice(1), 2), 1, '100.000%']],
            [[1,2,3,4,5], false, []],
            [[2,2,3,4,5,6], true, [str_repeat($this->getDice(2), 2), 1, '100.000%']],
            [[3,3,4,5,6,7], true, [str_repeat($this->getDice(3), 2), 1, '100.000%']],
            [[4,4,1,2,3,5], true, [str_repeat($this->getDice(4), 2), 1, '100.000%']],
            [[5,5,1,2,3,4], true, [str_repeat($this->getDice(5), 2), 1, '100.000%']],
            [[6,6,1,2,3,4], true, [str_repeat($this->getDice(6), 2), 1, '100.000%']],
            [[1,2,3,4,5,6,7,8,9], false, []],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new Pair();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Pair';
    }
}
