<?php

class GenerateHash {

    protected $salt = '';
    protected $user_salt = '';
    protected $password = '';

    public function __construct($password, $salt)
    {
        $this->$password = $password;
        $this->$salt = $salt;
    }

    public function hash($password, $salt)
    {
        $hash = hash("sha256", $password . $salt) or die('ERROR: Could not create hash');
        for ($i = 0; $i < HASH_ITER; $i++)
            $hash = hash("whirlpool", $hash . $i);

        return array('hash' => $hash, 'salt' => $salt);
    }

}

?>
