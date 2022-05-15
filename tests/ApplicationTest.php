<?php declare(strict_types=1);

namespace Cspray\SprayShell;

use Cspray\SprayShell\Command\InstallProprietaryNvidiaDriver;
use function Cspray\AnnotatedContainer\{compiler, containerFactory};

beforeEach(function() {
    $this->application = getTestContainer()->make(Application::class);
});

it('has correct name', function() {
    expect($this->application->getName())->toBe('sprayshell');
});

it('has correct version', function() {
    expect($this->application->getVersion())->toBe('0.1.0');
});

it('has install:nvidia-driver command', function() {
    expect($this->application->get('install:nvidia-driver'))->toBeInstanceOf(InstallProprietaryNvidiaDriver::class);
});