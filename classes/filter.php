<?php

namespace Biboletin;

class Filter
{
    public static function validate($data)
    {
        if (!is_array($data)) {
            $str = strip_tags(trim(self::toUTF($data)));

            $result = htmlspecialchars($str, ENT_QUOTES, "UTF-8");
        }

        if (is_array($data) || is_object($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $result[$key] = self::validate($value);
                } else {
                    $str = strip_tags(trim(self::toUTF($value)));
                    $result[$key] = htmlspecialchars($str, ENT_QUOTES, "UTF-8");
                }
            }
        }
        return $result;
    }

    private static function toUTF($str)
    {
        return mb_convert_encoding($str, "utf-8", mb_detect_encoding($str, "auto"));
        // return $str;
    }
}
