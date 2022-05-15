<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\ShellExecutionResults;

#[Service(profiles: ['prod'])]
class ProcOpenShellExecutor implements ShellExecutor {

    public function execute(string $cmd) : ShellExecutionResults {
        // TODO: Implement execute() method.
    }

}