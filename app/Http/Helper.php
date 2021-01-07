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
    public static function init($char, $key)
    {
        if (!ctype_alpha($char)) return $char;
        $start = ord(ctype_upper($char) ? 'A' : 'a');
        // mod = modulus
        $mod = fmod( ((ord($char) + $key) - $start), 26 ) + $start;
        return chr($mod);
    }

    public static function enc($string, $key)
    {
        $enrypted_text = "";
        $chars = str_split($string);
        foreach ($chars as $c) {
            $enrypted_text .= self::init($c, $key);
        }
        return $enrypted_text;
    }

    public static function dec($string, $key)
    {
        $decrypted_text = "";
        return self::enc($string, 26 - $key);
    }

}





?>