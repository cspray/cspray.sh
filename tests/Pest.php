<?php

namespace Cspray\SprayShell;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/


/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

use Cspray\AnnotatedContainer\AutowireableFactory;
use Cspray\AnnotatedContainer\ContainerDefinitionCompileOptionsBuilder as CompileOptionsBuilder;
use Cspray\AnnotatedContainer\ContainerFactoryOptionsBuilder as FactoryOptionsBuilder;
use Cspray\AnnotatedContainer\HasBackingContainer;
use Psr\Container\ContainerInterface;
use function Cspray\AnnotatedContainer\compiler;
use function Cspray\AnnotatedContainer\containerFactory;

function getTestContainer() : ContainerInterface&AutowireableFactory&HasBackingContainer {
    $rootDir = dirname(__DIR__);
    $containerDef = compiler()->compile(CompileOptionsBuilder::scanDirectories(
        $rootDir . '/src',
        $rootDir . '/tests/ServiceStub'
    )->build());
    return containerFactory()->createContainer(
        $containerDef,
        FactoryOptionsBuilder::forActiveProfiles('default', 'test')->build()
    );
}