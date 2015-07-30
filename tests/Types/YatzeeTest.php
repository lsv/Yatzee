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
use Lsv\Yatzee\Types\Yatzee;

class YatzeeTest extends AbstractOfaKindTest
{
    public function validProvider()
    {
        return [
            [1, true],
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
            [[7,7,7], true, [str_repeat($this->getDice(7), 3), 1, '100.000%'], 7],
            [[6,6,6], true, [str_repeat($this->getDice(6), 3), 1, '100.000%']],
            [[0,0,0,0], true, [str_repeat($this->getDice(0), 4), 1, '100.000%'], 10],
            [[1,1,1,1,1], true, [str_repeat($this->getDice(1), 5), 1, '100.000%']],
            [[1,2,3,4,5], false, []],
            [[2,2,2,2,2,2], true, [str_repeat($this->getDice(2), 6), 1, '100.000%']],
            [[3,3,3,3,3,4], false, []],
            [[4,4,4,4,4,4,4,4,4,4], true, [str_repeat($this->getDice(4), 10), 1, '100.000%']],
            [[1], true, [str_repeat($this->getDice(1), 1), 1, '100.000%']],
            [[1,2,3,4,5,6,7,8,9], false, []],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new Yatzee();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Yatzee';
    }
}
