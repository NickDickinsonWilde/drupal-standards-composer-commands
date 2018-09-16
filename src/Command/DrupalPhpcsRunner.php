<?php

namespace NickWilde1990\DrupalStandardsCommands\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Provides a phpcs command for use in drupal projects.
 */
class DrupalPhpcsRunner extends BaseCommand
{
    /**
     * The expected binary path.
     *
     * @var string
     */
    protected $bin = 'vendor/bin/phpcs';

    /**
     * The tool name.
     *
     * @var string
     */
    protected $name = 'PHPCS';

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('drupal-phpcs');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = $this->getIO();
        $package = $this->getComposer()->getPackage();
        $extra = $package->getExtra();
        $command = $this->bin;

        $result = 0;
        $output = [];
        exec('test -e phpcs.xml*', $output, $result);

        // If phpcs.xml/phpcs.xml.dist exists use that otherwise set defaults.
        if (!$result) {
            $io->write('Using existing PHPCS config file.');
        } else {
            if (isset($extra['drupal-standards']['phpcs'])) {
                $standard = $extra['drupal-standards']['phpcs'];
            } else {
                $standard = "Drupal";
            }
            $io->write("No PHPCS config file found. Using standard: {$standard}.");
            $command .= " --standard={$standard}";
            $command .= ' --extensions=php,module,inc,install,test,profile,theme,info,txt,md';
            $command .= ' --ignore=vendor,*/node_modules/*,*/bower_components/*';
        }

        $io->write("Running {$this->name}");
        exec($command . ' .', $output, $result);
        if ($result) {
            $io->write('PHPCS found errors:');
            $io->writeError($output);
            exit(1);
        }
        $io->write($output);
        $io->write("{$this->name} completed successfully.");
    }
}
