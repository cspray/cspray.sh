<?php declare(strict_types=1);

namespace Cspray\SprayShell\Service;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\SprayShell\Exception\FileNotFoundException;
use Cspray\SprayShell\Model\OsRelease;
use Cspray\SprayShell\Model\ShellExecutionResults;

#[Service]
final class FileParsingOsReleaseService implements OsReleaseService {

    public function __construct(
        private readonly ShellExecutor $shellExecutor,
        private readonly string $etcRelease = '/etc/os-release',
        private readonly string $usrLibRelease = '/usr/lib/os-release'
    ) {}

    public function getOsRelease() : OsRelease {
        $etcReleaseExists = file_exists($this->etcRelease);
        $usrLibExists = file_exists($this->usrLibRelease);
        if (!$etcReleaseExists && !$usrLibExists) {
            throw new FileNotFoundException(sprintf(
                'Could not find %s or %s.',
                $this->etcRelease,
                $this->usrLibRelease
            ));
        }

        $command = ["cat $this->usrLibRelease -- | xargs; echo \$ID"];
        $results = $this->shellExecutor->execute($command);

        return new class([]) implements OsRelease {

            public function __construct(private readonly array $map) {}

            public function getId() : string {
                return $this->map['ID'];
            }

            public function getName() : string {
                return $this->map['NAME'];
            }

            public function getPrettyName() : string {
                return $this->map['PRETTY_NAME'];
            }

            public function getVersion() : ?string {
                return $this->map['VERSION'];
            }

            public function getVersionId() : ?string {
                return $this->map['VERSION_ID'];
            }

            public function getAnsiColor() : ?string {
                return $this->map['ANSI_COLOR'];
            }

            public function getCpeName() : ?string {
                return $this->map['CPE_NAME'];
            }

            public function getHomeUrl() : string {
                return $this->map['HOME_URL'];
            }

            public function getSupportUrl() : string {
                return $this->map['SUPPORT_URL'];
            }

            public function getBugReportUrl() : string {
                return $this->map['BUG_REPORT_URL'];
            }

            public function getPrivacyPolicyUrl() : string {
                return $this->map['PRIVACY_POLICY_URL'];
            }

            public function getBuildId() : ?string {
                return null;
            }

            public function getVariant() : string {
                return $this->map['VARIANT'];
            }

            public function getVariantId() : string {
                return $this->map['VARIANT_ID'];
            }
        };
    }

}