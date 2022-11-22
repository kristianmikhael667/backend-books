<?php

namespace App\Helpers;

class GenerateCode
{
    public static function generetecode()
    {
        $randCode  = (string)mt_rand(1000, 9999);
        $randChar  = rand(65, 90);
        $randInx   = rand(0, 4);
        $randCode[$randInx] = chr($randChar);
        return $randCode;
    }
}
