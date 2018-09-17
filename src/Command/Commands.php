<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\Plugin\Capability\CommandProvider;

class Commands implements CommandProvider
{
    public function getCommands()
    {
        return [
            new DrupalPhpcsRunner(),
            new DrupalPhpcbfRunner(),
            new DrupalStyleLintRunner(),
        ];
    }
}
