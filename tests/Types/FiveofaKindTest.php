<?php
namespace Lsv\YatzeeTests\Types;

use Lsv\Yatzee\OutputData;
use Lsv\Yatzee\Types\FiveOfaKind;
use Lsv\YatzeeTests\TestBase;

class FiveofaKindTest extends TestBase
{

    static private $tester = null;

    static public function getTester()
    {
        if (self::$tester === null) {
            self::$tester = new FiveOfaKind();
        }
        return self::$tester;
    }

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
            [ [1,1,1,1,1], true, ['11111', 1, '100.000%'] ],
            [ [2,2,2,2,1], false, [] ],
            [ [2,2,2,2,2], true, ['22222', 1, '100.000%'] ],
        ];
    }

    /**
     * @dataProvider diceProvider
     * @param array $dices
     * @param bool $countReturn
     * @param array $outputData
     */
    public function test_count($dices, $countReturn, $outputData)
    {
        $return = self::getTester()->count(1, $dices);
        $this->assertEquals($countReturn, $return);

        if ($return) {
            $data = self::getTester()->write(1, $this->getOutputData());
            $this->assertEquals($outputData, $data->getRows()[0]);
        }

    }

    /**
     * @dataProvider validProvider
     * @param int $dices
     * @param bool $return
     */
    public function test_valid($dices, $return)
    {
        $this->assertEquals($return, self::getTester()->isValid($dices));
    }

    public function test_name()
    {
        $this->assertEquals('Five of a Kind', self::getTester()->getName());
    }

}
