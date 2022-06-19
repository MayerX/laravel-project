<?php

namespace App\Helpers\Hasher;

namespace App\Helpers;

use Illuminate\Contracts\Hashing\Hasher;

class MD5Hasher implements Hasher
{
    public function check($value, $hashedValue, array $options = [])
    {

        return $this->make($value) === $hashedValue;
    }

    public function make($value, array $options = [])
    {
        $value = env('SALT', '') . $value;

        return md5($value);  //这里写你自定义的加密方法
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }

    public function info($hashedValue)
    {
        return $this->driver()->info($hashedValue);
    }
}
