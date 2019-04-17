<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 08/04/2019
 * Time: 03:42
 */

namespace App\Util\Generic;


class StringUtil
{
    const CHARACTERS = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    /**
     * @return string
     */
    static public function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @param int $length
     * @param string
     *
     * @return string
     */
    static public function generateRandomString($length = 10, $characters = self::CHARACTERS)
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}