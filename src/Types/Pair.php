<?php

namespace Lsv\Yatzee\Types;

class Pair extends AbstractOfaKind
{
    protected $ofaKind = 2;

    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 2;
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Pair';
    }
}
