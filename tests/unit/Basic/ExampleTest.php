<?php

use \Basic\Example;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    public function testMe()
    {
        $example = new Example;
        $this->assertTrue($example->test());
    }
}