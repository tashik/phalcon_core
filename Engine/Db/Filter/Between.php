<?php
/**
 * @namespace
 */
namespace Engine\Db\Filter;

use \Engine\Mvc\Model\Query\Builder;

/**
 *  Between filter
 *
 * @category   Engine
 * @package    Db
 * @subpackage Filter
 */
class Between extends Standart
{
    /**
     * Filter field
     * @var string
     */
    protected $_field;

    /**
     * Max value
     * @var string|integer
     */
    protected $_min;

    /**
     * Max value
     * @var string|integer
     */
    protected $_max;

    /**
     * @var string
     */
    protected $_criteria;

    /**
     * @param string $field
     * @param string|integer $min
     * @param string|integer $max
     * @param string $criteria
     */
    public function __construct($field, $min, $max, $criteria = self::CRITERIA_EQ)
	{
		$this->_field = $field;
		$this->_min = $min;
		$this->_max = $max;
		$this->_criteria = $criteria;
	}

    /**
     * Apply filter to query builder
     *
     * @param \Engine\Mvc\Model\Query\Builder $dataSource
     * @return string
     */
    public function filterWhere(Builder $dataSource)
    {
        $adapter = $adapter =  $dataSource->getModel()->getReadConnection();
		return $this->_field.($this->_criteria == self::CRITERIA_NOTEQ) ? " NOT " : " ". "BETWEEN ".$adapter->escapeString($this->_min)." AND ".$adapter->escapeString($this->_max);
	}

}
