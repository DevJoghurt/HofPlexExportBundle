HofPlexExportBundle
=============
The `HofPlexExportBundle` exports your Plex media library.
My thanks goes to Dachande663 and plakna for their work in [Plex-Export](https://github.com/Dachande663/Plex-Export)

# Installation

### Step 1) Get the bundle and the library

First, grab the HofPlexExportBundle:


#### Using composer (symfony 2.1 pattern)

Add on composer.json (see http://getcomposer.org/)

    "require" :  {
        // ...
        "devjoghurt/hof-plexexport-bundle": "dev-master"
    }

### Step 2) Register the bundle

To start using the bundle, register it in your Kernel:

''php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Hof\PlexExportBundle\HofPlexExportBundle(),
    );
    // ...
''

## Step 3) (optional) Configure the bundle

The bundle comes with a sensible default configuration, which is listed below.
If you skip this step, these defaults will be used.

''yaml
# app/config/config.yml
hof_plex_export:
    config:
      plex_url: "http://localhost:32400"
      data_dir: "%kernel.root_dir%/../web/bundles/hofplexexport/media"
      img_path: "../bundles/hofplexexport/media"
      thumbnail_width: 150
      thumbnail_height: 250
      sections: "all"
      sort_skip_words: "a,the,der,die,das"
    template: "HofPlexExportBundle:PlexExport:plex_movies.html.twig"
''
# Render your view

''jinja
{{ plex_export() }}
''

If you want to add options or change your template, you can do something like this:

''jinja
{{ plex_export("HofWebsiteBundle:Movies:plex_movies.html.twig",{"stylesheets":false}) }}
''