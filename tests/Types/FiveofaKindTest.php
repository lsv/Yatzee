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
use Lsv\Yatzee\Types\FiveOfaKind;

class FiveofaKindTest extends AbstractOfaKindTest
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
            [7, true],
            [8, true],
        ];
    }

    public function diceProvider()
    {
        return [
            [[1,1,1,1,1], true, [str_repeat($this->getDice(1), 5), 1, '100.000%']],
            [[2,2,2,2,1], false, []],
            [[2,2,2,2,2], true, [str_repeat($this->getDice(2), 5), 1, '100.000%']],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new FiveOfaKind();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Five of a Kind';
    }
}
