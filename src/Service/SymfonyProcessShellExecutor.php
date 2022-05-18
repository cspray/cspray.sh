<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\ShellExecutionResults;
use Symfony\Component\Process\Process;

#[Service(profiles: ['prod'])]
final class SymfonyProcessShellExecutor implements ShellExecutor {

    public function execute(array $cmd) : ShellExecutionResults {
        $process = new Process($cmd);
        $process->mustRun();

        return new ShellExecutionResults(
            $process->getExitCode(),
            $process->getOutput(),
            empty($process->getErrorOutput()) ? null : $process->getErrorOutput()
        );
    }

}