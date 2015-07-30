<?php
namespace Types;

use Lsv\Yatzee\Types\TwoPair;
use Lsv\YatzeeTests\TestBase;

class MultipleTwoPairTest extends TestBase
{

    private function writeDice($first, $second)
    {
        return sprintf('%s%s', str_repeat($this->getDice($first), 2), str_repeat($this->getDice($second), 2));
    }

    public function diceProvider()
    {
        return [
            [ [[1,1,2,2,3],[1,1,2,2,4]], [$this->writeDice(1,2), 2, '100.000%'] ],
        ];
    }

    /**
     * @dataProvider diceProvider
     * @param array $dices
     * @param array $output
     */
    public function test_multiple($dices, $output)
    {
        $tester = new TwoPair();
        foreach($dices as $i => $dice) {
            $tester->count($i, $dice, 6);
        }
        $data = $tester->write(count($dices), $this->getOutputData());
        $this->assertEquals($output, $data->getRows()[0]);
    }

}
