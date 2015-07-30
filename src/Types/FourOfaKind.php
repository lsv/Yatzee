<?php

namespace Lsv\Yatzee\Types;

class FourOfaKind extends AbstractOfaKind
{
    protected $ofaKind = 4;

    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 4;
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Four of a Kind';
    }
}
