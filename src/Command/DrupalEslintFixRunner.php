<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

/**
 * Provides a Eslint fix command for use in drupal projects.
 */
class DrupalEslintFixRunnerRunner extends DrupalEslintRunner
{

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-eslint-fix');
        $this->setDescription('Automatically fix JS standards compliance issues with Eslint.');
        $this->name = 'Eslint Fix Mode';
        $this->bin = '--fix';
    }
}
