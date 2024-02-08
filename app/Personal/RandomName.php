<?php

namespace App\Personal;

class RandomName
{

    public static function get($count_symbol, $prefix="")
    {

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXVZabcdefghijklmnopqrstuvxyz0123456789";
		$name_file = $prefix;

		for ($i=0; $i<$count_symbol; $i++)
        {
            $name_file .= substr ($str, rand(1, strlen($str))-1 , 1);

        }
        return $name_file;
    }

}
