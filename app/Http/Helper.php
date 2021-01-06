<?php

if (!function_exists('api_response')) {
    function api_response($success, $message = null, $data = null, $code = 200)
    {
        return response()->json([
            'status' => $success == 1 ? 'success' : 'failed',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

class Caesar {
    public static function init($ch, $key)
    {
        if (!ctype_alpha($ch)) return $ch;
        $offset = ord('A');
        $mod = fmod( ((ord($ch) + $key) - $offset), 26 ) + $offset;
        return chr($mod);
    }

    public static function enc($string, $key)
    {
        $enrypted_text = "";
        $chars = str_split(strtoupper($string));
        foreach ($chars as $c) {
            $enrypted_text .= self::init($c, $key);
        }
        return $enrypted_text;
    }

    public static function dec($input, $key)
    {
        $decrypted_text = "";
        return self::enc($input, 26 - $key);
    }

}





?>