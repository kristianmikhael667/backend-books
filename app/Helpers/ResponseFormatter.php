<?php

namespace App\Helpers;

class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null,
        ],
        'data' => null,
    ];

    public static function like($data = null, $message = null) //ren
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function success($data = null, $message = null, $code = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['code'] = $code;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
