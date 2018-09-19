<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

/**
 * Provides a phpcbf command for use in drupal projects.
 */
class DrupalPhpcbfRunner extends DrupalPhpcsRunner
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-phpcbf');
        $this->setAliases(['cs-php-fix']);
        $this->setDescription('Automatically fix PHP standards compliance issues with PHPCBF.');
        $this->bin = 'vendor/bin/phpcbf';
        $this->name = 'PHPCBF';
    }
}
