<?php declare(strict_types=1);

namespace Cspray\SprayShell\Model;

use Exception;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

class InstalledPackages implements \Countable, \IteratorAggregate {

    public function __construct(InstalledPackage... $installedPackage) {

    }

    public function get(int $index) : ?InstalledPackage {

    }

    public function getIterator() : Traversable {
        // TODO: Implement getIterator() method.
    }

    public function count() : int {
        // TODO: Implement count() method.
    }
}