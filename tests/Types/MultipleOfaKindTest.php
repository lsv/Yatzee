<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Types;

use Lsv\Yatzee\Types\FiveOfaKind;
use Lsv\YatzeeTests\TestBase;

class MultipleOfaKindTest extends TestBase
{
    public function diceProvider()
    {
        return [
            [[[1,1,1,1,1],[1,1,1,1,1]], [str_repeat($this->getDice(1), 5), 2, '100.000%']],
        ];
    }

    /**
     * @dataProvider diceProvider
     *
     * @param array $dices
     * @param array $output
     */
    public function test_multiple($dices, $output)
    {
        $tester = new FiveOfaKind();
        foreach ($dices as $i => $dice) {
            $tester->count($i, $dice, 6);
        }
        $data = $tester->write(count($dices), $this->getOutputData());
        $this->assertEquals($output, $data->getRows()[0]);
    }
}
