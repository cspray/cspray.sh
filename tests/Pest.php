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

function getSprayShellOsReleaseContent() : string {
    return <<<STRING
STRING;
}

function getFedoraOsReleaseContent() : string {
    return <<<STRING
NAME="Fedora Linux"
VERSION="35 (Workstation Edition)"
ID=fedora
VERSION_ID=35
VERSION_CODENAME=""
PLATFORM_ID="platform:f35"
PRETTY_NAME="Fedora Linux 35 (Workstation Edition)"
ANSI_COLOR="0;38;2;60;110;180"
LOGO=fedora-logo-icon
CPE_NAME="cpe:/o:fedoraproject:fedora:35"
HOME_URL="https://fedoraproject.org/"
DOCUMENTATION_URL="https://docs.fedoraproject.org/en-US/fedora/f35/system-administrators-guide/"
SUPPORT_URL="https://ask.fedoraproject.org/"
BUG_REPORT_URL="https://bugzilla.redhat.com/"
REDHAT_BUGZILLA_PRODUCT="Fedora"
REDHAT_BUGZILLA_PRODUCT_VERSION=35
REDHAT_SUPPORT_PRODUCT="Fedora"
REDHAT_SUPPORT_PRODUCT_VERSION=35
PRIVACY_POLICY_URL="https://fedoraproject.org/wiki/Legal:PrivacyPolicy"
VARIANT="Workstation Edition"
VARIANT_ID=workstation
STRING;

}