<?php
namespace Lsv\Yatzee\Types;

class Yatzee extends AbstractOfaKind
{

    protected $ofaKind = 0;

    /**
     * @param int $numDices
     * @return bool
     */
    public function isValid($numDices)
    {
        return true;
    }

    /**
     * @param integer $numRoll
     * @param array $dices
     * @return bool
     */
    public function count($numRoll, array $dices)
    {
        $this->ofaKind = count($dices);
        return parent::count($numRoll, $dices);
    }

    /**
     * Name of the type
     * @return string
     */
    public function getName()
    {
        return 'Yatzee';
    }
}
