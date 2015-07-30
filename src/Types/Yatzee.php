<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Lsv\Yatzee\Types;

class Yatzee extends AbstractOfaKind
{
    protected $ofaKind = 0;

    /**
     * @param int $numDices
     *
     * @return bool
     */
    public function isValid($numDices)
    {
        return true;
    }

    /**
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
