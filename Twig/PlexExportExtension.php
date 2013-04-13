<?php

namespace Hof\PlexExportBundle\Twig;

class PlexExportExtension extends \Twig_Extension {

    protected $container;
    protected $template;

    public function __construct($container, $template) {
        $this->container = $container;
        $this->template = $template;
    }

    public function getFunctions() {
        return array(
            'plex_export' => new \Twig_Function_Method($this, 'plexExport'),
        );
    }

    public function plexExport($template = false,$options = array("stylesheets"=>true)) {
        if($template){
            $this->template = $template;
        }
        if (!$this->template instanceof \Twig_Template) {
            try {
                $this->template = $this->container->get('twig')->loadTemplate($this->template);
            } catch (\ErrorException $e) {
                throw new \Exception("Could not load template: " . $this->template, 99, $e);
            }
        }
        $html = $this->template->displayBlock("plex_export", array('options' => $options));
        return $html;
    }

    public function getName() {
        return 'hof_plex_export';
    }

}