<?php

namespace Borsaco\DoctrinePrefixBundle\Doctrine\ORM\Mapping;

use Doctrine\ORM\Mapping\NamingStrategy;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class PrefixNamingStrategy implements NamingStrategy
{
    use ContainerAwareTrait;
    
    /** 
     * @var NamingStrategy 
     */
    protected $strategy;

    /** 
     * @var string 
     */
    protected $tablePrefix;

    /** 
     * @var string 
     */
    protected $columnPrefix;

    /**
     * @var array
     */

    protected $config;

    /**
     * @param string $tablePrefix
     * @param string $columnPrefix
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->tablePrefix = $config['table_prefix'];
        $this->columnPrefix = $config['column_prefix'];
    }

    public function setStrategy()
    {
        $strategyClass = $this->container->getParameter("{$this->config['naming_strategy']}.class");
        $this->strategy = new $strategyClass;
    }

    public function classToTableName($className)
    {
        return $this->tablePrefix . $this->strategy->classToTableName($className);
    }

    public function propertyToColumnName($propertyName, $className = null)
    {
        if($this->strategy->propertyToColumnName($propertyName, $className) == 'id') {
            return 'id';
        }

        return $this->columnPrefix . $this->strategy->propertyToColumnName($propertyName, $className);
    }

    public function embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className = null, $embeddedClassName = null)
    {
        return $this->columnPrefix . $this->strategy->embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className, $embeddedClassName);
    }

    public function referenceColumnName()
    {
        return 'id';
    }

    public function joinColumnName($propertyName)
    {
        if($this->strategy->joinColumnName($propertyName) == 'id') {
            return 'id';
        }

        return $this->columnPrefix . $this->strategy->joinColumnName($propertyName);
    }

    public function joinTableName($sourceEntity, $targetEntity, $propertyName = null)
    {
        return $this->tablePrefix . $this->strategy->joinTableName($sourceEntity, $targetEntity, $propertyName);
    }

    public function joinKeyColumnName($entityName, $referencedColumnName = null)
    {
        if($this->strategy->joinKeyColumnName($entityName, $referencedColumnName) == 'id') {
            return 'id';
        }

        return $this->columnPrefix . $this->strategy->joinKeyColumnName($entityName, $referencedColumnName);
    }
}
