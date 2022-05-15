<?php declare(strict_types=1);

namespace Cspray\SprayShell\Command;

use Cspray\SprayShell\ServiceStub\MockShellExecutor;
use function Cspray\SprayShell\getTestContainer;

beforeEach(function() {
    $this->container = getTestContainer();
    $this->mockExecutor = $this->container->get(MockShellExecutor::class);
    $this->command = $this->container->make(InstallProprietaryNvidiaDriver::class);
});

it('has the correct name', function() {
    expect($this->command->getName())->toBe('install:nvidia-driver');
});

it('has the correct description', function() {
    expect($this->command->getDescription())->toBe('Installs the latest proprietary nvidia driver for newer GPUs.');
});

it('has no arguments', function() {
    expect($this->command->getDefinition()->getArgumentCount())->toBeEmpty();
});

it('has no options', function() {
    expect($this->command->getDefinition()->getOptions())->toBeEmpty();
});

it('executes command to check-update, has error status when updates available', function() {

});