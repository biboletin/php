<?php

/*
 * The MIT License
 *
 * Copyright 2018 Bilyan Ivanov <biboletin87@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * Simplse Calculator class
 * It provides addition, subtraction, multiply and division
 *
 * USE
 * Calculator::add(1, 1);
 * Calculator::subtract(2, 1);
 * Calculator::multiply(5, 5);
 * Calculator::divide(15, 5);
 *
 * PHP Version 7.2
 *
 * @category Calculator
 * @package  Calculator
 * @author   Biboletin <biboletin87@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/biboletin/php
 */
namespace Biboletin;

use Exception;

class Calculator
{

//    public function __construct() {}
    public static function add($x, $y)
    {
        if (empty($x) || empty($y)) {
            throw new Exception("Empty arguments: " . __METHOD__);
        }


        if (is_float($x + 0) || is_float($y + 0)) {
            return (float) $x + $y;
        }

        if (is_int($x) || is_int($y)) {
            return (int) $x + $y;
        }
    }

    public static function subtract($x, $y)
    {
        if (empty($x) || empty($y)) {
            throw new Exception("Empty arguments: " . __METHOD__);
        }

        if (is_float($x + 0) || is_float($y + 0)) {
            return (float) $x - $y;
        }

        if (is_int($x) || is_int($y)) {
            return (int) $x - $y;
        }
    }
    
    public static function multiply($x, $y)
    {
        if (empty($x) || empty($y)) {
            throw new Exception("Empty arguments: " . __METHOD__);
        }
        return ($x * $y);
    }
    
    public static function divide($x, $y)
    {
        if (empty($x) || empty($y)) {
            throw new Exception("Empty arguments: " . __METHOD__);
        }
        return ($x / $y);
    }
}
