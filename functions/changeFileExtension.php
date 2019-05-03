<?php
/**
 * This function reverse|change given file( or array of files) extension.
 * In this way if the computer has cryptovirus, he couldn't crypt it.
 * If the function parameter is array or string - returns array or string.
 * In all other cases return null or empty string.
 *
 *
 * @param mixed $file string|array
 * @return mixed string|array|null|empty string
 */
function changeFileExtension($file = null)
{
    if ($file === null) {
        return '';
    }

    if ($file === '') {
        return '';
    }

    if (is_object($file)) {
        return '';
    }

    if (is_resource($file)) {
        return '';
    }

    if (is_bool($file)) {
        return '';
    }

    if (is_int($file)) {
        return '';
    }

    if (empty($file)) {
        return '';
    }

    $extensions = [
        'pdf' => 'fdp',
        'txt' => 'xtt',
        'doc' => 'cod',
        'docx' => 'xcod',
        'xls' => 'slx',
        'xlt' => 'tlx',
        'xlst' => 'tslx',
        'xlsx' => 'xxslx',
        'csv' => 'vsc',
        'jpg' => 'gpj',
        'jpeg' => 'gepj',
        'bmp' => 'pmb',
        'png' => 'gnp',
        'odt' => 'tdo',
        'zip' => 'piz',
        'rar' => 'raar',
        'gif' => 'fig',
    ];


    if (is_array($file)) {
        $filess = [];

        foreach ($file as $files) {
            $extension = end(explode(".", $files));
            $fileName = basename($files, "." . $extension);

            foreach ($extensions as $key => $val) {
                if ($extension != $key) {
                    continue;
                }

                $filess[] = $fileName . '.' . $val;
                break;
            }
        }
            return $filess;
    }

    $extension = end(explode(".", $file));
    $fileName = basename($file, "." . $extension);

    foreach ($extensions as $key => $val) {
        if ($extension == $key) {
            $filess = $fileName . '.' . $val;
            break;
        }
    }
    return $filess;
}
