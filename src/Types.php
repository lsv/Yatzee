<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Lsv\Yatzee;

/**
 * Class Types.
 *
 * @codeCoverageIgnore
 */
class Types
{
    /**
     * @var TypeInterface[]
     */
    protected $types = [];

    /**
     * @param TypeInterface $type
     */
    public function addType(TypeInterface $type)
    {
        $this->types[] = $type;
    }

    /**
     * @return TypeInterface[]
     */
    public function getTypes()
    {
        return $this->types;
    }
}
