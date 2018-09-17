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
}
