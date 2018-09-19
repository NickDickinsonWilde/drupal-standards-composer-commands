<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\IO\IOInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Provides a stylelint command for use in drupal projects.
 */
class DrupalStyleLintRunner extends BaseRunner
{

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-stylelint');
        $this->setAliases(['cs-css-scan']);
        $this->setDescription('Scan for CSS standards compliance with stylelint.');
        $this->name = 'Stylelint';
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = $this->getIO();
        $package = 'vendor/nickwilde1990/drupal-standards-composer-commands';
        $command = "{$package}/node_modules/.bin/stylelint {$this->bin} ./*.css";

        $result = 0;
        $output = [];

        exec('test -e .stylelintrc.json', $output, $result);
        if (!$result) {
            $io->write('Using existing .stylelintrc.json config file.');
        } else {
            $io->write("No .stylelintrc.json config file found. Using Drupal core standards.");
            $command .= " --config={$package}/.stylelintrc.json";
        }

        exec('test -e .stylelintignore', $output, $result);
        if (!$result) {
            $io->write('Using existing .stylelintrc.json config file.');
        } else {
            $io->write('No .stylelintignore found. Using defaults.');
            $command .= " --ignore-path={$package}/.stylelintignore";
        }

        $command .= " --config-basedir={$package}";

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
