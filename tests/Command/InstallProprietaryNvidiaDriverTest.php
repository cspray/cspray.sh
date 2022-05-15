<?php declare(strict_types=1);

namespace Cspray\SprayShell\Command;

use Cspray\SprayShell\Service\ShellExecutor;

beforeEach(function() {
    $this->mockExecutor = $this->getMockBuilder(ShellExecutor::class)->getMock();
    $this->command = new InstallProprietaryNvidiaDriver($this->mockExecutor);
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