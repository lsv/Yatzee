<?php

namespace Lsv\Yatzee;

/**
 * Class OutputData.
 *
 * @codeCoverageIgnore
 */
class OutputData
{
    /**
     * @var array
     */
    protected $rows = [];

    /**
     * @var int
     */
    protected $first;

    /**
     * @var string
     */
    protected $total;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string
     */
    private $totalPercent;

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
     * @param string $first
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
