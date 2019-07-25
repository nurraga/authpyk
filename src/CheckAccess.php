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

    public static function module($modul, $function)
    {
        $app_code = env('APP_CODE');

        $access_data = json_decode(session('ACCESS_DATA'));

        $acc_app = false;

        $acc_modul = false;

        $acc_func = false;

        $status = false;

        if ($access_data != null) {

            foreach ($access_data as $ad) {

                if ($ad->kode_aplikasi == $app_code) {

                    $acc_app = true;
                }

                if ($ad->nama_modul == $modul) {

                    $acc_modul = true;
                }

                if ($ad->nama_function == '*') {

                    if ($ad->status == 1) {

                        $acc_func = true;

                    }

                } else {

                    if ($ad->nama_function == $function) {

                        if ($ad->status == 1) {

                            $acc_func = true;

                        }

                    }

                }

            }

        }

        if ($acc_app == true) {

            if ($acc_modul == true) {

                if ($acc_func == true) {

                    $status = true;

                }

            }

        }

        return $status;
        
    }

}
