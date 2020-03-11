<?php

namespace Borsaco\DoctrinePrefixBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\HttpKernel\Kernel;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        if (Kernel::VERSION_ID >= 40200) {
            $builder = new TreeBuilder('doctrine_prefix');
        } else {
            $builder = new TreeBuilder();
        }
        $rootNode = \method_exists($builder, 'getRootNode') ? $builder->getRootNode() : $builder->root('doctrine_prefix');

        $rootNode
            ->children()
            ->scalarNode('table_prefix')->defaultValue('')->end()
            ->scalarNode('column_prefix')->defaultValue('')->end()
            ->arrayNode('naming_strategy')->children()
                ->scalarNode('class')->defaultValue('Doctrine\ORM\Mapping\UnderscoreNamingStrategy')->end()
                ->arrayNode('arguments')->scalarPrototype()->end()
            ->end()
            ->end();

        return $builder;
    }

}
