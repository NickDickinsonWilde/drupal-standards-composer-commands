<?php

namespace NickWilde1990\DrupalStandardsCommands;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;

/**
 * Publish capabilities to Composer.
 */
class ComposerPlugin implements PluginInterface, Capable, EventSubscriberInterface
{
  /**
   * @var IOInterface
   */
  private $io;

  /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;
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

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            ScriptEvents::POST_INSTALL_CMD => [
                ['installTestDependencies', 1],
            ],
            ScriptEvents::POST_UPDATE_CMD => [
                ['installTestDependencies', 1],
            ]
        ];
    }

    /**
     * Install npm based testing dependencies.
     *
     * @param Event $event
     */
    public function installTestDependencies(Event $event) {
        $cd = getcwd();
        chdir('vendor/nickwilde1990/drupal-standards-composer-commands');
        exec("{$cd}/vendor/bin/npm install");
        chdir($cd);

    }
}
