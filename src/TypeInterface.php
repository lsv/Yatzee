<?php
namespace Lsv\Yatzee;

interface TypeInterface
{

    /**
     * @param int $numDices
     * @return bool
     */
    public function isValid($numDices);

    /**
     * @param integer $numRoll
     * @param array $dices
     * @return bool
     */
    public function count($numRoll, array $dices);

    /**
     * Get array of data output
     * @param int $rolls
     * @param OutputData $output
     * @return OutputData
     */
    public function write($rolls, OutputData $output);

    /**
     * Can write data
     * @return bool
     */
    public function canWrite();

    /**
     * Name of the type
     * @return string
     */
    public function getName();

}
