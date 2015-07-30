<?php
namespace Lsv\YatzeeTests\Types;

use Lsv\Yatzee\Types\AbstractOfaKind;
use Lsv\YatzeeTests\TestBase;

abstract class AbstractOfaKindTest extends TestBase
{

    /**
     * @return array
     */
    abstract public function validProvider();

    /**
     * @return array
     */
    abstract public function diceProvider();

    /**
     * @return AbstractOfaKind
     */
    abstract public function getTester();

    /**
     * @return string
     */
    abstract public function getTesterName();

    /**
     * @dataProvider diceProvider
     * @param array $dices
     * @param bool $countReturn
     * @param array $outputData
     * @param int $dicesize
     */
    public function test_count($dices, $countReturn, $outputData, $dicesize = 6)
    {
        $tester = $this->getTester();

        $return = $tester->count(1, $dices, $dicesize);
        $this->assertEquals($countReturn, $return, 'counter');
        $this->assertEquals($return, $tester->canWrite(), 'can write');
        if ($return) {
            $data = $tester->write(1, $this->getOutputData());
            $this->assertEquals($outputData, $data->getRows()[0], 'writer');
        }

    }

    /**
     * @dataProvider validProvider
     * @param int $dices
     * @param bool $return
     */
    public function test_valid($dices, $return)
    {
        $tester = $this->getTester();
        $this->assertEquals($return, $tester->isValid($dices), 'isvalid');
    }

    public function test_name()
    {
        $tester = $this->getTester();
        $this->assertEquals($this->getTesterName(), $tester->getName(), 'name');
    }

}
