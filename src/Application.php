<?php declare(strict_types=1);

namespace Cspray\SprayShell;

use Cspray\AnnotatedContainer\AutowireableFactory;
use Symfony\Component\Console\Application as ConsoleApplication;

final class Application extends ConsoleApplication {

    public function __construct(private readonly AutowireableFactory $factory) {
        parent::__construct('sprayshell', '0.1.0');
        $this->init();
    }

    private function init() : void {
        // we'll add commands here later
    }

}