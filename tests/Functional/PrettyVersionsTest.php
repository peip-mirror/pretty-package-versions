<?php

namespace Tests\Functional;

use Jean85\PrettyVersions;
use Jean85\Version;
use PackageVersions\Versions;
use PHPUnit\Framework\TestCase;

class PrettyVersionsTest extends TestCase
{
    public function testVersion()
    {
        $version = PrettyVersions::getVersion('phpunit/phpunit');

        $this->assertInstanceOf(Version::class, $version);
        $this->assertSame(Versions::getVersion('phpunit/phpunit'), $version->getFullVersion());
    }

    public function testVersionLetsExceptionRaise()
    {
        $this->expectException(\Throwable::class);

        PrettyVersions::getVersion('non-existent-vendor/non-existent-package');
    }
}
