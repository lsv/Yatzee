<?php
namespace Lsv\YatzeeTests;

use Lsv\Yatzee\OutputData;

abstract class TestBase extends \PHPUnit_Framework_TestCase
{

    protected function getOutputData()
    {
        return new OutputData('', []);
    }

    protected function getDice($dice)
    {
        switch ($dice) {
            case 1:
                return '⚀';
            case 2:
                return '⚁';
            case 3:
                return '⚂';
            case 4:
                return '⚃';
            case 5:
                return '⚄';
            case 6:
                return '⚅';
            default:
                return $dice;
        }
    }

}
