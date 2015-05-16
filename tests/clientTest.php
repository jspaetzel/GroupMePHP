<?php

class ClientTest extends PHPUnit_Framework_TestCase
{
    private $c;

    public function __construct () {
        $this->c = new GroupMePHP\client('token');
    }

    public function testSimpleQueryString()
    {
        $args = array();
        $queryString = $this->c->buildQueryString($args);
        $this->assertEquals("?token=token", $queryString);
    }

    public function testComplexQueryString() {
        $args = array('a' => 1, 'b' => 2);
        $queryString = $this->c->buildQueryString($args);
        $this->assertEquals("?a=1&b=2&token=token", $queryString);
    }
}
