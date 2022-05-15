<?php declare(strict_types=1);

namespace Cspray\SprayShell;

use Cspray\SprayShell\Model\ShellExecutionResults;
use Cspray\SprayShell\Service\ShellExecutor;
use Cspray\SprayShell\ServiceStub\MockShellExecutor;
use Mockery;

beforeEach(function() {
    $this->mockExecutor = new MockShellExecutor();
});

afterEach(function() {
    Mockery::close();
});

it('has a mock returned from getMock', function() {
    expect($this->mockExecutor->getMock())->toBeInstanceOf(ShellExecutor::class);
});

it('delegates execute to the mock', function() {
    $this->mockExecutor->getMock()
        ->expects('execute')
        ->with('test-command')
        ->andReturn(new ShellExecutionResults());

    $this->mockExecutor->execute('test-command');
});

it('returns execution results from mock', function() {
    $this->mockExecutor->getMock()
        ->expects('execute')
        ->with('test-command')
        ->andReturn($expectedResults = new ShellExecutionResults());

    expect($this->mockExecutor->execute('test-command'))->toBe($expectedResults);
});