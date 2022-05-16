<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Exception\FileNotFoundException;
use Cspray\SprayShell\Model\OsRelease;

#[Service]
final class FileParsingOsReleaseService implements OsReleaseService {

    public function getOsRelease() : OsRelease {
        throw new FileNotFoundException('Could not find /etc/os-release or /usr/lib/os-release.');
    }

}