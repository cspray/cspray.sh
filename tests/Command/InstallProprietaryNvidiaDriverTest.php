<?php declare(strict_types=1);

namespace Cspray\SprayShell\Command;

use Cspray\SprayShell\Service\ShellExecutor;
use function Cspray\SprayShell\getTestContainer;

beforeEach(function() {
    $this->command = getTestContainer()->make(InstallProprietaryNvidiaDriver::class);
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