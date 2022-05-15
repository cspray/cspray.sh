<?php declare(strict_types=1);

namespace Cspray\SprayShell\ServiceStub;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\ShellExecutionResults;
use Cspray\SprayShell\Service\ShellExecutor;
use Mockery\MockInterface;

#[Service(profiles: ['test'])]
class MockShellExecutor implements ShellExecutor {

    public function execute(string $cmd) : ShellExecutionResults {
        // TODO: Implement execute() method.
    }
}