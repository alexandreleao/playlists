<?php

namespace App\API;


class ApiError
{
    public static function errorMessage($message, $code)
    {
        return[
            'playlist' => [
                'msg' => $message,
                'code' => $code
            ]
        ];
    }
}