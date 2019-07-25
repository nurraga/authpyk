<?php

namespace Authpyk\Ac;
/**
 * Created by PhpStorm.
 * User: kominfo
 * Date: 2019-07-24
 * Time: 10:12
 */

class CheckAccess
{
    public static function module($kode_aplikasi, $modul, $function)
    {
        //$accessData = session('accessData');
        //return json_decode($accessData);
        return $kode_aplikasi. ' | ' .$modul. ' | ' .$function;

    }
}
