<?php
class ClientTest extends PHPUnit_Framework_TestCase {
	public funciton testFormQueryString() {
		$c = new client('token');
		$args = array('a' => 1, 'b' => 2)
		$queryString = client.buildQueryString($args);
		$this->assertEquals($queryString, "?token=token&a=1&b=2")

		$args = array()
		$queryString = client.buildQueryString($args);
		$this->assertEquals($queryString, "?token=token")
	}
}
?>
