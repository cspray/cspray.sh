<?php declare(strict_types=1);

namespace Cspray\SprayShell\ServiceStub;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\ShellExecutionResults;
use Cspray\SprayShell\Service\ShellExecutor;
use Mockery;
use Mockery\MockInterface;

#[Service(profiles: ['test'])]
final class MockShellExecutor implements ShellExecutor {

    private readonly MockInterface $mock;

    public function __construct() {
        $this->mock = Mockery::mock(ShellExecutor::class);
    }

    public function getMock() : MockInterface {
        return $this->mock;
    }

    public function execute(array $cmd) : ShellExecutionResults {
        return $this->mock->execute($cmd);
    }
}