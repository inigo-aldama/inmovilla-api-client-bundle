<?php

namespace Inmovilla\ApiClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('inmovilla_api_client');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('agency')->defaultValue('%env(INMOVILLA_AGENCY)%')->end()
            ->scalarNode('password')->defaultValue('%env(INMOVILLA_PASSWORD)%')->end()
            ->integerNode('language')->defaultValue('%env(int:INMOVILLA_LANGUAGE)%')->end()
            ->scalarNode('api_url')->defaultValue('%env(INMOVILLA_API_URL)%')->end()
            ->scalarNode('domain')->defaultValue('%env(INMOVILLA_DOMAIN)%')->end()
            ->end();

        return $treeBuilder;
    }
}