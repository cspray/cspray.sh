<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\SprayShell\Exception\FileNotFoundException;
use function Cspray\SprayShell\getTestContainer;

beforeEach(function() {
    $this->container = getTestContainer();
    $this->service = $this->container->get(FileParsingOsReleaseService::class);
});

it('throws exception if no file present', fn() => $this->service->getOsRelease())
    ->throws(FileNotFoundException::class, 'Could not find /etc/os-release or /usr/lib/os-release.');