<?php declare(strict_types=1);

namespace Cspray\SprayShell\Command;

use Cspray\SprayShell\Service\ShellExecutor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class InstallProprietaryNvidiaDriver extends Command {

    public function __construct(private readonly ShellExecutor $shellExecutor) {
        parent::__construct();
    }

    protected function configure() {
        $this->setName('install:nvidia-driver');
        $this->setDescription('Installs the latest proprietary nvidia driver for newer GPUs.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        return self::FAILURE;
    }

}