<?php

include 'cookies.php';
include 'hash.php';
include 'session.php';
include 'token.php';
include 'filter.php';
include 'config.php';

use Biboletin\Filter;

$filter = new Filter();

echo $filter->toUTF("да бе да");