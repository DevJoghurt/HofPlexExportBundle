<?php
namespace Hof\PlexExportBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PlexExportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('plex:export')
            ->setDescription('Export your Plex media library')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $plex_exporter = $this->getContainer()->get('hof.plex.exporter');
        $plex_exporter->run();

    }
}
