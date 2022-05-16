<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\ShellExecutionResults;

#[Service]
interface ShellExecutor {

    public function execute(array $cmd) : ShellExecutionResults;

}