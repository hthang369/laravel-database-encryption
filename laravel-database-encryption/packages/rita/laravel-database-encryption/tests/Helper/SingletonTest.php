<?php
/**
 * tests/Helper/SingletonTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Helper;

use Rita\Database\Encryption\Tests\TestCase;
use Rita\Database\Encryption\EncryptionHelper;
use DatabaseEncryption;

/**
 * SingletonTest
 */
class SingletonTest extends TestCase
{
    public function testSingleton()
    {
        $this->assertSame(DatabaseEncryption::getInstance(), EncryptionHelper::getInstance());
    }
}
