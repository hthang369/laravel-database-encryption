<?php
/**
 * tests/Defaults/VersioningTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Defaults;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionDefaults;

/**
 * VersioningTest
 */
class VersioningTest extends TestCase
{
    public function testVersioning()
    {
        $defaults = $this->getMockBuilder(EncryptionDefaults::class)->getMockForAbstractClass();
        $this->assertEquals(true, $defaults::DEFAULT_VERSIONING);
        $this->assertSame($defaults::DEFAULT_VERSIONING, $defaults->isVersioningDefault());
        $this->assertSame(!$defaults::DEFAULT_VERSIONING, $defaults->isVersionlessDefault());
    }
}
