<?php

class HTMLElement
{

    public function __construct(HTMLInput $input)
    {
    }
}

$input = new HTMLElement("input", [
    "id" => "",
    "class" => "",
    "name" => "",
    "value" => "",
    "onclick" => "",
    "onblur" => "",
]);

echo $input->type("text")
    ->class("test")
    ->id("test")
    ->readOnly()
    ->value()
    ->style();
