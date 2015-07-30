<?php
namespace Lsv\YatzeeTests;

use Lsv\Yatzee\OutputData;

abstract class TestBase extends \PHPUnit_Framework_TestCase
{

    protected function getOutputData()
    {
        return new OutputData('', []);
    }

}
