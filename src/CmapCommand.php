<?php

namespace Michaeljs1990\Cmap;

use Michaeljs1990\Cmap\Graph\Package;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class that contains the base graph command
 *
 * Class CmapCommand
 * @package Michaeljs1990\Cmap
 */
class CmapCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('graph')
            ->setDescription('Get number of dependencies for a given package')
            ->addArgument(
                'package',
                InputArgument::REQUIRED,
                'Composer package in question?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $package = $input->getArgument('package');

        if ($package) {
            (new Package($package, $input, $output))->execute();
        }
    }
}