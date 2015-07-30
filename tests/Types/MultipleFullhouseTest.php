<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Types;

use Lsv\Yatzee\Types\FullHouse;
use Lsv\YatzeeTests\TestBase;

class MultipleFullhouseTest extends TestBase
{
    private function writeDice($first, $second)
    {
        return sprintf('%s%s', str_repeat($this->getDice($first), 3), str_repeat($this->getDice($second), 2));
    }

    public function diceProvider()
    {
        return [
            [[[1,1,2,2,2],[1,1,2,2,2]], [$this->writeDice(2, 1), 2, '100.000%']],
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
        $tester = new FullHouse();
        foreach ($dices as $i => $dice) {
            $tester->count($i, $dice, 6);
        }
        $data = $tester->write(count($dices), $this->getOutputData());
        $this->assertEquals($output, $data->getRows()[0]);
    }
}
