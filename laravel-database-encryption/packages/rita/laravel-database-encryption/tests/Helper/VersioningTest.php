<?php
/**
 * tests/Helper/VersioningTestp
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Helper;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionHelper;

/**
 * VersioningTest
 */
class VersioningTest extends TestCase
{
    public function testVersioningCached()
    {
        $helper = (new EncryptionHelper())->setVersioning(null);

        $this->assertAttributeEquals(null, 'versioningCache', $helper);
        $this->assertTrue(is_bool($helper->isVersioning()));
        $this->assertAttributeNotSame(null, 'versioningCache', $helper);
    }

    public function testVersioningTrue()
    {
        $helper = (new EncryptionHelper())->setVersioning(true);

        $this->assertTrue($helper->isVersioning());
    }

    public function testVersioningFalse()
    {
        $helper = new EncryptionHelper();

        $helper->setVersioning(false);
        $this->assertFalse($helper->isVersioning());
    }
}
