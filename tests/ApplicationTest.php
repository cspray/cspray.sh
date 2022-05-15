<?php declare(strict_types=1);

namespace Cspray\SprayShell;

use Cspray\AnnotatedContainer\ContainerDefinitionCompileOptionsBuilder as CompileOptionsBuilder;
use Cspray\AnnotatedContainer\ContainerFactoryOptionsBuilder as FactoryOptionsBuilder;
use Cspray\SprayShell\Command\InstallProprietaryNvidiaDriver;
use function Cspray\AnnotatedContainer\{compiler, containerFactory};

beforeEach(function() {
    $rootDir = dirname(__DIR__);
    $containerDef = compiler()->compile(CompileOptionsBuilder::scanDirectories($rootDir . '/src')->build());
    $this->autowireFactory = containerFactory()->createContainer(
        $containerDef,
        FactoryOptionsBuilder::forActiveProfiles('default', 'test')->build()
    );
    $this->application = new Application($this->autowireFactory);
});

it('has correct name', function() {
    expect($this->application->getName())->toBe('sprayshell');
});

it('has correct version', function() {
    expect($this->application->getVersion())->toBe('0.1.0');
});

it('has install:nvidia-driver command', function() {
    expect($this->application->get('install:nvidia-driver'))->toBeInstanceOf(InstallProprietaryNvidiaDriver::class);
});