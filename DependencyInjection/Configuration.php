<?php

namespace Hof\PlexExportBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hof_plex_export');
        /*
         *  'plex-url' => 'http://localhost:32400',
         *  'data-dir' => 'plex-data',
         *  'thumbnail-width' => 150,
         *  'thumbnail-height' => 250,
         *  'sections' => 'all',
         *  'sort-skip-words' => 'a,the,der,die,das'
         */
        $rootNode
                ->children()
                    ->arrayNode('config')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('plex_url')->defaultValue('http://localhost:32400')->end()
                            ->scalarNode('data_dir')->defaultValue('%kernel.root_dir%/../web/bundles/hofplexexport/media')->end()
                            ->scalarNode('img_path')->defaultValue('../bundles/hofplexexport/media')->end()
                            ->scalarNode('thumbnail_width')->defaultValue(150)->end()
                            ->scalarNode('thumbnail_height')->defaultValue(250)->end()
                            ->scalarNode('sections')->defaultValue('all')->end()
                            ->scalarNode('sort_skip_words')->defaultValue('a,the,der,die,das')->end()
                        ->end()
                    ->end()
                    ->scalarNode('template')->defaultValue('HofPlexExportBundle:PlexExport:plex_movies.html.twig')->end()
                ->end();

        return $treeBuilder;
    }

}
