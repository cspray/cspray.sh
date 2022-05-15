<?php declare(strict_types=1);

namespace Cspray\SprayShell\Command;

use Cspray\SprayShell\Service\ShellExecutor;
use Symfony\Component\Console\Command\Command;

final class InstallProprietaryNvidiaDriver extends Command {

    public function __construct(private readonly ShellExecutor $shellExecutor) {
        parent::__construct();
    }

    protected function configure() {
        $this->setName('install:nvidia-driver');
        $this->setDescription('Installs the latest proprietary nvidia driver for newer GPUs.');
    }

}