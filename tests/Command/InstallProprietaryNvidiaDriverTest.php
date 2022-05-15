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
