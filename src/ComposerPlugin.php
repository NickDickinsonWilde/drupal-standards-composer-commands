<?php

namespace NickWilde1990\DrupalStandardsRunner;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;

/**
 * Publish capabilities to Composer.
 */
class ComposerPlugin implements PluginInterface, Capable
{

    /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getCapabilities()
    {
        return [
            'Composer\Plugin\Capability\CommandProvider' =>
                'NickWilde1990\DrupalStandardsCommands\Command\Commands',
        ];
    }
}
