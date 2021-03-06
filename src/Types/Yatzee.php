<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

/**
 * Counter for yatzees.
 */

namespace Lsv\Yatzee\Types;

/**
 * Class Yatzee.
 */
class Yatzee extends AbstractOfaKind
{
    /**
     * How many of the kind do we need.
     *
     * @var int
     */
    protected $ofaKind = 0;

    /**
     * Is it valid.
     *
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return true;
    }

    /**
     * Count the values.
     *
     * @param int   $numRoll
     * @param array $dices
     * @param int   $dicesize
     *
     * @return bool
     */
    public function count($numRoll, array $dices, $dicesize)
    {
        $this->ofaKind = count($dices);

        return parent::count($numRoll, $dices, $dicesize);
    }

    /**
     * Name of the type.
     *
     * @return string
     */
    public function getName()
    {
        return 'Yatzee';
    }
}
