<?php

namespace Borsaco\DoctrinePrefixBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('doctrine_prefix');
        $rootNode = $treeBuilder->root('doctrine_prefix');

	    $rootNode
            ->children()
                ->scalarNode('table_prefix')->defaultValue('')->end()
                ->scalarNode('column_prefix')->defaultValue('')->end()
                ->scalarNode('naming_strategy')->defaultValue('doctrine.orm.naming_strategy.default')->end()
            ->end();

        return $treeBuilder;
    }

}
