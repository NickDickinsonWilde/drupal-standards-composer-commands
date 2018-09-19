<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\Command\BaseCommand;

/**
 * A base command runner.
 */
abstract class BaseRunner extends BaseCommand
{
    /**
     * The expected binary path.
     *
     * @var string
     */
    protected $bin;

    /**
     * The tool name.
     *
     * @var string
     */
    protected $name;

    protected function getExtra($key, $group = null, $default = null)
    {
        static $extra = 0;
        if ($extra === 0) {
            $settings = $this->getComposer()->getPackage()->getExtra();
            $extra = isset($settings['drupal-standards-commands']) ? $settings['drupal-standards-commands'] : [];
        }
        if ($group) {
            return isset($extra[$group][$key]) ? $extra[$group][$key] : $default;
        }
        return isset($extra[$key]) ? $extra[$key] : $default;
    }
}
