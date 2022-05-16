<?php declare(strict_types=1);

namespace Cspray\SprayShell\Model;

class ShellExecutionResults {

    public function __construct(
        private readonly int $statusCode = 0
    ) {}

    public function getStatusCode() : int {
        return $this->statusCode;
    }

    public function getOutput() : string {

    }

    public function getErrorOutput() : string {

    }

}