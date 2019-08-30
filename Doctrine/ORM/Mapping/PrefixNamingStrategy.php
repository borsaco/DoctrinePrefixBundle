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
     * @param string $tablePrefix
     * @param string $columnPrefix
     */
    public function __construct($tablePrefix, $columnPrefix)
    {
        $this->tablePrefix = $tablePrefix;
        $this->columnPrefix = $columnPrefix;
    }

    public function setStrategy($strategyType)
    {
        $strategyClass = $this->container->getParameter($strategyType.'.class');
        $this->strategy = new $strategyClass;
    }

    public function classToTableName($className)
    {
        return $this->tablePrefix . $this->strategy->classToTableName($className);
    }

    public function propertyToColumnName($propertyName, $className = null)
    {
        return $this->columnPrefix . $this->strategy->propertyToColumnName($propertyName, $className);
    }

    public function embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className = null, $embeddedClassName = null)
    {
        return $this->columnPrefix . $this->strategy->embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className, $embeddedClassName);
    }

    public function referenceColumnName()
    {
        return $this->columnPrefix . $this->strategy->referenceColumnName();
    }

    public function joinColumnName($propertyName)
    {
        return $this->columnPrefix . $this->strategy->joinColumnName($propertyName);
    }

    public function joinTableName($sourceEntity, $targetEntity, $propertyName = null)
    {
        return $this->tablePrefix . $this->strategy->joinTableName($sourceEntity, $targetEntity, $propertyName);
    }

    public function joinKeyColumnName($entityName, $referencedColumnName = null)
    {
        return $this->columnPrefix . $this->strategy->joinKeyColumnName($entityName, $referencedColumnName);
    }
}
