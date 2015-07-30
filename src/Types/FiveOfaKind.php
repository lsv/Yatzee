<?php
namespace Lsv\Yatzee\Types;

use Lsv\Yatzee\OutputData;

class FiveOfaKind extends AbstractOfaKind
{

    /**
     * @param int $numDices
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 5;
    }

    /**
     * @param integer $numRoll
     * @param array $dices
     * @return bool
     */
    public function count($numRoll, array $dices)
    {
        return self::ofaKindCount($numRoll, $dices, 5);
    }

    /**
     * Get array of data output
     * @param int $rolls
     * @param OutputData $output
     * @return OutputData
     */
    public function write($rolls, OutputData $output)
    {
        return self::ofaKindWrite($rolls, $output, 5);
    }

    /**
     * Name of the type
     * @return string
     */
    public function getName()
    {
        return 'Five of a Kind';
    }
}
