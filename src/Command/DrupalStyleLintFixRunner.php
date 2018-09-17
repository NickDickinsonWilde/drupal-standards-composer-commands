<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Provides a stylelint fix mode command for use in drupal projects.
 */
class DrupalStyleLintFixRunner extends DrupalStyleLintRunner
{

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-stylelint-fix');
        $this->setDescription('Automatically fix CSS standards compliance issues with stylelint.');
        $this->name = 'Stylelint Fix Mode';
        $this->bin = ' --fix';
    }
}
