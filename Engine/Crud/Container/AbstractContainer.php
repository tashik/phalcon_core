<?php
/**
 * @namespace
 */
namespace Engine\Crud\Container;

/**
 * Class AbstractContainer.
 *
 * @category   Engine
 * @package    Crud
 * @subpackage Container
 */
abstract class AbstractContainer
{
	const MODEL          = 'model';
	const JOINS          = 'joins';
	const CONDITIONS	 = 'conditions';
	
	/**
	 * Database model
	 * @var \Engine\Mvc\Model
	 */
	protected $_model;
	
	/**
	 * Joins to database
	 * @var array
	 */
	protected $_joins = [];
	
	/**
	 * Container conditions
	 * @var array
	 */
	protected $_conditions = [];
	
	/**
	 * Set container options
	 * 
	 * @param array $options
	 * @return \Engine\Crud\Container\AbstractContainer
	 */
	public function setOptions(array $options)
	{
		foreach ($options as $key => $value) {
            switch ($key) {
                case self::MODEL:
                    $this->setModel($value);
                    break;
                case self::JOINS:
                    $this->setJoinModels($value);
                    break;
                case self::CONDITIONS:
                	$this->setConditions($value);
                	break;
                default:
                    // ignore unrecognized configuration directive
                    break;
            }
        }
        
        return $this;
	}
	
	/**
	 * Return database modle
	 * 
	 * @return \Engine\Mvc\Model
	 */
	public function getModel()
	{
		return $this->_model;
	}
	
	/**
	 * Set container conditions
	 * 
	 * @param array|string $conditions
	 * @return \Engine\Crud\Container\AbstractContainer
	 */
	public function setConditions($conditions)
	{
		if(null === $conditions || $conditions === false) {
			return false;
		}
		if(!is_array($conditions)) {
			$conditions = array($conditions);
		}
		foreach ($conditions as $cond) {
			if($cond == "") {
				continue;
			}
			$this->_conditions[] = $cond;
		}
		
		return $this;
	}
	
	/**
	 * Set primary model
	 * 
	 * @param string|array $model
	 * @return void
	 */
	abstract public function setModel($model = null);
	
	/**
	 * Set join models
	 * 
	 * @param array $models
	 * @return void
	 */
	abstract public function setJoinModels(array $models);
}