<?php

if (!function_exists('getOpsi')) {
    function getOpsi($param =  null)
    {
        $d =  [
            'B' => 'Benar',
            'S' => 'Salah',
        ];

        if (isset($d[$param])) {
            return $d[$param];
        } 

        return $d;
    }
}
