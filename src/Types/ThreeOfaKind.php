<?php
namespace Lsv\Yatzee\Types;

class ThreeOfaKind extends AbstractOfaKind
{

    protected $ofaKind = 3;

    /**
     * @param int $numDices
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 3;
    }

    /**
     * Name of the type
     * @return string
     */
    public function getName()
    {
        return 'Three of a Kind';
    }
}
