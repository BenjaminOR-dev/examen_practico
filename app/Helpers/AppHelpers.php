<?php

namespace App\Helpers;

class AppHelpers
{

    /**
     *  Retorna una alerta
     */
    public static function alert(String $title, String $text, String $type = 'success')
    {
        return [
            'alert' => [
                'type'  => $type,
                'title' => $title,
                'text'  => $text
            ]
        ];
    }
}
