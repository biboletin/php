<?php

namespace Biboletin;

use Exception;

class FileHandler
{
    private $fileName;
    private $tmpName;
    private $fileSize;
    private $maxFileSize;
    private $tmpDir;
    private $dir;
    private $extension;
    private $error;
    private $allowedExtensions  = [
        "txt",
        "pdf",
        "jpg",
        "jpeg",
    ];

    public function __construct()
    {
        // var_dump($_FILES);
        if (empty($_FILES)) {
            throw new Exception(__CLASS__ . " There is no Files");
        }
    }

    // public function decodeFile(){}
    // public function encodeFile(){}
    // public function save(){}
    // public function download($filePath){}
    // public function directory(){}
    // public function setDirectory(){}
    public function setMaxFileSize($fileSize, $sizeUnit = null)
    {
        $default = ini_get("upload_max_filesize");
        $unit = strtolower(substr($default, -1));

        if ($sizeUnit !== null) {
        }
    }
    public function getMaxFileSize()
    {
        return $this->maxFileSize;
    }
}
