<?php declare(strict_types=1);

namespace Cspray\SprayShell\Model;

final class ShellExecutionResults {

    public function __construct(
        private readonly int $statusCode,
        private readonly ?string $output,
        private readonly ?string $errOutput
    ) {}

    public function getStatusCode() : int {
        return $this->statusCode;
    }

    public function getOutput() : ?string {
        return $this->output;
    }

    public function getErrorOutput() : ?string {
        return $this->errOutput;
    }

}