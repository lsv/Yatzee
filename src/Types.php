<?php

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
