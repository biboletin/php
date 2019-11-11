<?php

include 'cookies.php';
include 'hash.php';
include 'session.php';
include 'token.php';
include 'filter.php';
include 'config.php';
include 'htmlElement.php';

use Biboletin\HTMLElement;

$input = new HTMLElement("input");
$input->type("text")
        ->addClass(['test-text'])
        ->value('   123')
        ->readOnly(true);
        // ->getElement();



$select = new HTMLElement("select");
$dataArray1 = [
    '11111',
    '22222',
    '33333',
];
$dataArray2 = [
    'id' => 1,
    'name' => 'User',
    'email' => 'office@brcomp.eu',
];

$dataArray3 = [
    ['name' => 'Admin1'],
    ['name' => 'Admin2'],
    ['name' => 'Admin3'],
];

$select
        ->addClass(['class-select-name'])
        ->id('id_select_name')
        ->options($dataArray3);



$div = new HTMLElement("div");
echo $div
    ->addClass(['className'])
    ->id('idName')
    ->plainText("Test")
    ->plainText($input->getElement())
    ->plainText("<br/>")
    ->plainText("Test")
    ->plainText($select->getElement())
    ->getElement();
