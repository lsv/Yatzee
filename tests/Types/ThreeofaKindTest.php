<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace Lsv\Yatzeetests\Types;

use Lsv\Yatzee\TypeInterface;
use Lsv\Yatzee\Types\ThreeOfaKind;

class ThreeofaKindTest extends AbstractOfaKindTest
{
    /**
     * @return array
     */
    public function validProvider()
    {
        return [
            [1, false],
            [2, false],
            [3, true],
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
            [[1,1,1,2], true, [str_repeat($this->getDice(1), 3), 1, '100.000%']],
            [[2,2,3,3], false, []],
            [[2,2,2,4], true, [str_repeat($this->getDice(2), 3), 1, '100.000%']],
            [[3,3,3,4,4,5,5,6], true, [str_repeat($this->getDice(3), 3), 1, '100.000%']],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new ThreeOfaKind();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Three of a Kind';
    }
}
