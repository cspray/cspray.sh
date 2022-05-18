<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\SprayShell\Model\ShellExecutionResults;
use function Cspray\SprayShell\getTestContainer;

beforeEach(function() {
    $this->service = getTestContainer()->get(SymfonyProcessShellExecutor::class);
});

it('returns output and 0 status code', function() {
    $command = ['echo', 'foobar'];
    /** @var ShellExecutionResults $results */
    $results = $this->service->execute($command);

    expect($results->getStatusCode())->toBe(0);
    expect($results->getOutput())->toBe('foobar' . PHP_EOL);
    expect($results->getErrorOutput())->toBeNull();
});

it('returns output and error status code', function() {
    $command = ['echo baz; exit 1'];
    $results = $this->service->execute($command);

    expect($results->getStatusCode())->toBe(255);
    expect($results->getOutput())->toBe('baz' . PHP_EOL);
    expect($results->getErrorOutput())->toBeNull();
});