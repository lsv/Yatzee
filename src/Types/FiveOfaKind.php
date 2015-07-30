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
 * Count five of a kind.
 */

namespace Lsv\Yatzee\Types;

/**
 * Class FiveOfaKind.
 */
class FiveOfaKind extends AbstractOfaKind
{
    /**
     * How many of the kind do we need.
     *
     * @var int
     */
    protected $ofaKind = 5;

    /**
     * Is it valid to run.
     *
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
