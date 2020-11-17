<?php
/**
 * tests/Helper/VersionPartsTest
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
 * VersionPartsTest
 */
class VersionPartsTest extends TestCase
{
    public function testVersionPartsDefault()
    {
        $parts = EncryptionHelper::getInstance()->getVersionParts();

        $this->assertEquals(explode('.', EncryptionHelper::VERSION), $parts);
    }

    public function testVersionPartsNull()
    {
        $parts = EncryptionHelper::getInstance()->getVersionParts(null);

        $this->assertEquals(explode('.', EncryptionHelper::VERSION), $parts);
    }

    public function testVersionPartsPadded()
    {
        for ($x = 1; $x <= LARAVEL_DATABASE_ENCRYPTION_ITERATIONS; $x++) {
            $parts = EncryptionHelper::getInstance()->getVersionParts($x);

            foreach ($parts as $part) {
                $this->assertEquals($x, strlen($part));
            }
        }
    }
}
