<?php

/*
 * This file is part of the Lsv\Yatzee package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

/**
 * Output data generator
 */
namespace Lsv\Yatzee;

/**
 * Class OutputData.
 *
 * @codeCoverageIgnore
 */
class OutputData
{
    /**
     * Rows of data
     *
     * @var array
     */
    protected $rows = [];

    /**
     * When was the first roll
     *
     * @var int
     */
    protected $first;

    /**
     * Total number of rolls
     *
     * @var string
     */
    protected $total;

    /**
     * Name of the type
     *
     * @var string
     */
    private $name;

    /**
     * Headers
     *
     * @var array
     */
    private $headers;

    /**
     * Percent for total
     *
     * @var string
     */
    private $totalPercent;

    /**
     * Construct
     *
     * @param string $name
     * @param array $headers
     */
    public function __construct($name, array $headers)
    {
        $this->name = $name;
        $this->headers = $headers;
    }

    /**
     * Gets the Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the Headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Gets the First.
     *
     * @return int
     */
    public function getFirst()
    {
        return $this->first + 1;
    }

    /**
     * Sets the First.
     *
     * @param int $first
     *
     * @return OutputData
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Gets the Total.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the Total.
     *
     * @param string $total
     *
     * @return OutputData
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Set total percent
     *
     * @param string $percent
     *
     * @return $this
     */
    public function setTotalPercent($percent)
    {
        $this->totalPercent = $percent;

        return $this;
    }

    /**
     * Gets the TotalPercent.
     *
     * @return string
     */
    public function getTotalPercent()
    {
        return $this->totalPercent;
    }

    /**
     * Gets the Rows.
     *
     * @return array
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * Add a row of data
     *
     * @param $row
     *
     * @return $this
     */
    public function addRow($row)
    {
        $this->rows[] = $row;

        return $this;
    }
}
