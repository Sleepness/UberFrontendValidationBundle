<?php

namespace Sleepness\UberFrontendValidationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Respond for building configuration of bundle
 *
 * @author Viktor Novikov <viktor.novikov95@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generate the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sleepness_uber_frontend_validation');

        return $treeBuilder;
    }
}
