<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\SprayShell\Model\InstalledPackages;

interface PackageManager {

    public function hasUpdates(string $package = null) : bool;

    public function update(string $package = null) : InstalledPackages;

    public function install(string $package) : InstalledPackages;


}