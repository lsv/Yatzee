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
use Lsv\Yatzee\Types\TwoPair;

class TwoPairTest extends AbstractOfaKindTest
{
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

    private function writeDice($first, $second)
    {
        return sprintf('%s%s', str_repeat($this->getDice($first), 2), str_repeat($this->getDice($second), 2));
    }

    public function diceProvider()
    {
        return [
            [[1,1,2,2,3], true, [$this->writeDice(1, 2), 1, '100.000%']],
            [[2,2,3,3,4], true, [$this->writeDice(2, 3), 1, '100.000%']],
            [[2,2,1,1,3], true, [$this->writeDice(1, 2), 1, '100.000%']],
            [[1,2,2,3,4], false, []],
        ];
    }

    /**
     * @return TypeInterface
     */
    public function getTester()
    {
        return new TwoPair();
    }

    /**
     * @return string
     */
    public function getTesterName()
    {
        return 'Two pairs';
    }
}
