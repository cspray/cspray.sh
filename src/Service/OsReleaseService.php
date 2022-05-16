<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Model\OsRelease;

#[Service]
interface OsReleaseService {

    public function getOsRelease() : OsRelease;

}