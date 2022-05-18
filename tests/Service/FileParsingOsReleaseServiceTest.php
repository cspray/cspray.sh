<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\SprayShell\Exception\FileNotFoundException;
use Cspray\SprayShell\Model\OsRelease;
use function Cspray\AnnotatedContainer\autowiredParams;
use function Cspray\AnnotatedContainer\rawParam;
use function Cspray\AnnotatedContainer\serviceParam;
use function Cspray\SprayShell\getTestContainer;
use function Cspray\Typiphy\objectType;

beforeEach(function() {
    $this->container = getTestContainer();
});

it('throws exception if no file present', function() {
    $service = $this->container->make(
        FileParsingOsReleaseService::class,
        autowiredParams(
            serviceParam('shellExecutor', objectType(SymfonyProcessShellExecutor::class)),
            rawParam('etcRelease', '/not/present/file'),
            rawParam('usrLibRelease', '/not/present/file')
        )
    );
    $service->getOsRelease();
})->throws(FileNotFoundException::class, 'Could not find /etc/os-release or /usr/lib/os-release.');

it('parses /usr/lib if /etc is not present', function(string $method, ?string $expected) {
    $service = $this->container->make(
        FileParsingOsReleaseService::class,
        autowiredParams(
            serviceParam('shellExecutor', objectType(SymfonyProcessShellExecutor::class)),
            rawParam('etcRelease', '/not/present/file'),
            rawParam('usrLibRelease', dirname(__DIR__) . '/Fixture/os-release/sprayshell.txt')
        )
    );

    $osRelease = $service->getOsRelease();
    expect($osRelease->$method())->toBe($expected);
})->with([
    ['getId', 'sprayshell'],
    ['getName', 'SprayShell Linux'],
    ['getPrettyName', 'SprayShell Linux 1 (Alpha)'],
    ['getVersion', '1 (Alpha)'],
    ['getVersionId', '1'],
    ['getAnsiColor', '1;39;3;61;111;181'],
    ['getCpeName', 'cpe:/o:sprayshellproject:sprayshell:1'],
    ['getHomeUrl', 'https://sprayshell.example.com/home'],
    ['getSupportUrl', 'https://sprayshell.example.com/support'],
    ['getBugReportUrl', 'https://sprayshell.example.com/bug_report'],
    ['getPrivacyPolicyUrl', 'https://sprayshell.example.com/privacy'],
    ['getVariant', 'SprayShell Alpha Edition'],
    ['getVariantId', 'alphaedition'],
    ['getBuildId', null]
]);

it('parses /etc if present', function(string $method, ?string $expected) {
    $service = $this->container->make(
        FileParsingOsReleaseService::class,
        autowiredParams(
            serviceParam('shellExecutor', objectType(SymfonyProcessShellExecutor::class)),
            rawParam('etcRelease', dirname(__DIR__) . '/Fixture/os-release/fedora.txt'),
            rawParam('usrLibRelease', dirname(__DIR__) . '/Fixture/os-release/sprayshell.txt')
        )
    );

    /** @var OsRelease $osRelease */
    $osRelease = $this->service->getOsRelease();
    expect($osRelease->$method())->toBe($expected);
})->with([
    ['getId', 'fedora'],
    ['getName', 'Fedora Linux'],
    ['getPrettyName', 'Fedora Linux 35 (Workstation Editation)'],
    ['getVersion', '35 (Workstation Edition)'],
    ['getVersionId', '35'],
    ['getAnsiColor', '0;38;2;60;110;180'],
    ['getCpeName', 'cpe:/o:fedoraproject:fedora:35'],
    ['getHomeUrl', 'https://fedoraproject.org'],
    ['getSupportUrl', 'https://ask.fedoraproject.org'],
    ['getBugReportUrl', 'https://bugzilla.redhat.com'],
    ['getPrivacyPolicyUrl', 'https://fedoraproject.org/wiki/Legal:PrivacyPolicy'],
    ['getVariant', 'Workstation Edition'],
    ['getVariantId', 'workstation'],
    ['getBuildId', null]
]);