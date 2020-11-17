<?php
/**
 * tests/Traits/FloatTest.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Traits;

use Rita\Database\Encryption\Tests\DatabaseTestCase;
use Rita\Database\Encryption\Tests\Models\DatabaseModel;

/**
 * FloatTest
 */
class FloatTest extends DatabaseTestCase
{
    public function testCreate()
    {
        $model = DatabaseModel::create($this->randomValues());

        $this->assertFalse(empty($model->should_be_encrypted_float));
    }

    public function testShouldBeEncryptedFloat()
    {
        $model = DatabaseModel::create($this->randomValues());

        $this->assertTrue($model->exists);
        $this->assertNotFalse(strpos($model->getOriginal('should_be_encrypted_float'), '__LARAVEL-DATABASE-ENCRYPTED-'));
        $this->assertFalse(is_int($model->should_be_encrypted_float));
        $this->assertTrue(is_float($model->should_be_encrypted_float));
        $this->assertTrue(is_double($model->should_be_encrypted_float));
        $this->assertFalse(is_string($model->should_be_encrypted_float));
    }

    public function testShouldntBeEncryptedFloat()
    {
        $model = DatabaseModel::create($this->randomValues());

        $this->assertTrue($model->exists);
        $this->assertFalse(is_int($model->shouldnt_be_encrypted_float));
        $this->assertTrue(is_float($model->shouldnt_be_encrypted_float));
        $this->assertTrue(is_double($model->shouldnt_be_encrypted_float));
        $this->assertFalse(is_string($model->should_be_encrypted_float));
    }
}
