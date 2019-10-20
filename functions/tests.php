<?php
    include "changeFileExtension.php";


    $files = [
        'test1.exe',
        'test1.iso',
        'test1.pdf',
        'test2.txt',
        'test3.doc',
        'test4.docx',
        'test5.xls',
        'test6.xlt',
        'test7.xlst',
        'test8.xlsx',
        'test9.csv',
        'test10.jpg',
        'test11.jpeg',
        'test12.bmp',
        'test13.png',
        'test14.odt',
        'test15.zip',
        'test16.rar',
        'test17.gif',
    ];
    var_dump(changeFileExtension(true));
    var_dump(changeFileExtension(false));
    var_dump(changeFileExtension());
    var_dump(changeFileExtension(123));
    var_dump(changeFileExtension(""));
    var_dump(changeFileExtension("file1.docx"));
    var_dump(changeFileExtension("file2.doc"));
    var_dump(changeFileExtension("file3.xls"));
    var_dump(changeFileExtension("file4.zip"));
    var_dump(changeFileExtension("1111file5.jpg"));
    var_dump(changeFileExtension("1111file6.exe"));
    var_dump(changeFileExtension($files));
