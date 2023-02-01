<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/aws-polly-bundle
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Bundle\AwsPollyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ang3_aws_polly');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode('version')->cannotBeEmpty()->defaultValue('2016-06-10')->end()
            ->scalarNode('region')->cannotBeEmpty()->defaultValue('us-east-1')->end()
            ->scalarNode('default_engine')->cannotBeEmpty()->defaultValue('standard')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
