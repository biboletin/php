<?php

namespace Biboletin;

class Filter
{
    public function sanitizeInput($data, $flag = ENT_COMPAT, $encoding = "utf-8")
    {
        if (!is_array($data)) {
            return htmlspecialchars(trim($data), $flag, $encoding);
        }
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                return $this->sanitizeInput($value);
            }
            $data[$key] = htmlspecialchars(trim($value), $flag, $encoding);
        }
        return $data;
    }

    public function sanitizeOutput($data, $flag = ENT_COMPAT, $encoding = "utf-8")
    {
        if (!is_array($data)) {
            return htmlspecialchars_decode(trim($data));
        }
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                return $this->sanitizeOutput($value);
            }
			$data[$key] = htmlspecialchars_decode(trim($value));
        }
        return $data;
    }

    public function toUTF($data)
    {
        if (!is_array($data)) {
            return mb_convert_encoding(
				$data, 
				"utf-8", 
				mb_detect_encoding($data, "auto")
			);
        }
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                return $this->toUTF($value);
            }
			$data[$key] = mb_convert_encoding(
				$value, 
				"utf-8", 
				mb_detect_encoding($value, "auto")
			);
        }
        return $data;
    }
}
