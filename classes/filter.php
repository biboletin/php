<?php

namespace Biboletin;

class Filter
{
    public function sanitizeInput($data, $flag = ENT_COMPAT, $encoding = "utf-8")
    {
		if(!is_array($data)){
			return htmlspecialchars(trim($data), $flag, $encoding);
		}
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				return sanitize($value);
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
				return sanitizeOutput($value);
			} else {
				$data[$key] = htmlspecialchars_decode(trim($value));
			}
		}
		return $data;
	}

    public function toUTF($data)
    {
		if (!is_array($data)) {
			return iconv("windows-1251", "utf-8", $data);
		}
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				toUTF($value);
			} else {
				$data[$key] = iconv("windows-1251", "utf-8", $value);
			}
		}
		return $data;
    }
}
