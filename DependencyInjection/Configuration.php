<?php

namespace Domnikl\StatsdBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('domnikl_statsd');

        $rootNode
            ->children()
            ->scalarNode('namespace')
                ->defaultValue('')
            ->end();

        $rootNode
            ->children()
            ->arrayNode('connection')
                ->children()
                    ->scalarNode('class')
                        ->defaultValue('\Domnikl\Statsd\Connection\Socket')
                    ->end()
                    ->scalarNode('host')
                        ->defaultValue('localhost')
                    ->end()
                    ->integerNode('port')
                        ->defaultValue(8125)
                    ->end()
                    ->integerNode('timeout')
                        ->defaultValue(null)
                    ->end()
                    ->booleanNode('persistent')
                        ->defaultValue(false)
                    ->end();

        return $treeBuilder;
    }
}
