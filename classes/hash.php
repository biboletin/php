<?php

namespace Biboletin;

use Exception;

class StringHasher
{
    private $salt;
    private $algorithm;

    public function __construct($hashAlgorithm, $salt = null)
    {
        $this->algorithm = 'md5';
        if ($hashAlgorithm !== "") {
            $this->algorithm = $hashAlgorithm;
        }
        $this->salt = $salt;
    }

    public function hashit($stringForHash)
    {
        $hash = $stringForHash . $this->salt;

        if ($this->algorithm === 'md5') {
            return md5($hash);
        }

        if ($this->algorithm == 'crypt') {
            return crypt($hash);
        }
        return hash($this->algorithm, $hash);
    }

    public function check($unhashed, $hashed)
    {
        if ($this->algorithm === 'md5') {
            return (bool) (md5(trim($unhashed)) === $hashed);
        }
        if ($this->algorithm === 'crypt') {
            return (bool) (hash_equals($hashed, crypt($unhashed, $hashed)));
        }
        return (bool) (hash($this->algorithm, $unhashed) === $hashed);
    }

    public function setAlgorithm($algo = null)
    {
        $this->algorithm = strip_tags(trim($algo));
    }

    public function getAlgorithm()
    {
        return strtoupper($this->algorithm);
    }

    public function setSalt($salt = null)
    {
        $this->salt = $salt;
    }
    public function getSalt()
    {
        return $this->salt;
    }

    public function __destruct()
    {
        $this->salt = null;
        $this->algorithm = null;
    }
}
