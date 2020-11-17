<?php
/**
 * tests/Models/DatabaseModel.php
 *
 * @package     laravel-database-encryption
 * @link        https://github.com/Rita/laravel-database-encryption
 * @author      Austin Heap <me@Rita.com>
 * @version     v0.2.1
 */

namespace Rita\Database\Encryption\Tests\Models;

use Rita\Database\Encryption\Traits\HasEncryptedAttributes;

/**
 * DatabaseModel
 */
class DatabaseModel extends RealModel
{
    use HasEncryptedAttributes;

    public $table = 'test_models';

    protected $fillable = [
        'should_be_encrypted',
        'shouldnt_be_encrypted',
        'should_be_encrypted_float',
        'shouldnt_be_encrypted_float',
        'should_be_encrypted_int',
        'shouldnt_be_encrypted_int',
    ];

    protected $encrypted = [
        'should_be_encrypted',
        'should_be_encrypted_float',
        'should_be_encrypted_int',
    ];
}
