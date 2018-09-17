<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Provides a phpcs command for use in drupal projects.
 */
class DrupalPhpcbfRunner extends DrupalPhpcsRunner
{
    /**
     * The expected binary path.
     *
     * @var string
     */
    protected $bin = 'vendor/bin/phpcbf';

    /**
     * The tool name.
     *
     * @var string
     */
    protected $name = 'PHPCBF';

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-phpcbf');
        $this->setDescription('Automatically fix as many standards errors as possible with PHPCBF.');
    }

}
