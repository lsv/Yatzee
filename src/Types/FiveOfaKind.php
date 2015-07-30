<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

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
