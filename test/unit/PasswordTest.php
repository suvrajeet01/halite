<?php
use \ParagonIE\Halite\Password;
use \ParagonIE\Halite\Symmetric\SecretKey as SymmetricKey;

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PasswordTest extends PHPUnit_Framework_TestCase
{
    public function testEncrypt()
    {
        $key = new SymmetricKey(\str_repeat('A', 32));
        
        $hash = Password::hash('test password', $key);
        $this->assertTrue(is_string($hash));
        
        $this->assertTrue(
            Password::verify('test password', $hash, $key)
        );
        
        $this->assertFalse(
            Password::verify('wrong password', $hash, $key)
        );
    }
}
