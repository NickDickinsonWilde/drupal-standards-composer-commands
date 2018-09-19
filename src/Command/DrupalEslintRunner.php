<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\IO\IOInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Provides a Eslint check command for use in drupal projects.
 */
class DrupalEslintRunner extends BaseRunner
{

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-eslint');
        $this->setAliases(['cs-js-scan']);
        $this->setDescription('Scan for JS standards compliance with Eslint.');
        $this->name = 'Eslint';
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = $this->getIO();
        $package = 'vendor/nickwilde1990/drupal-standards-composer-commands';
        $command = "{$package}/node_modules/.bin/eslint {$this->bin}";

        $result = 0;
        $output = [];

        exec('test -e .eslintrc.json', $output, $result);
        if (!$result) {
            $io->write('Using existing .eslintrc.json config file.');
        } else {
            $io->write("No .eslintrc.json config file found. Using Drupal core standards.");
            $command .= " --config={$package}/.eslintrc.json";
        }

        exec('test -e .eslintignore', $output, $result);
        if (!$result) {
            $io->write('Using existing .eslintignore config file.');
        } else {
            $io->write('No .eslintignore found. Using defaults.');
            $command .= " --ignore-path={$package}/.eslintignore";
        }

        $command .= ' --ext=.js';
        $command .= ' --format=stylish';
        $command .= ' .';

        $io->write("Running {$this->name}");
        $io->write($command, true, IOInterface::VERY_VERBOSE);
        exec($command . ' .', $output, $result);
        if ($result) {
            $io->write("{$this->name} found errors:");
            $io->writeError($output);
            exit(1);
        }
        $io->write($output);
        $io->write("{$this->name} completed successfully.");
    }
}
