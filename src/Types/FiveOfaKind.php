<?php

namespace Lsv\Yatzee\Types;

class FiveOfaKind extends AbstractOfaKind
{
    protected $ofaKind = 5;

    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return $numDices >= 5;
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Five of a Kind';
    }
}
