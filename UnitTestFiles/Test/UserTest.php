<?php

class UserTest extends TestCase{
	public function testReturnsFullName(){
		require 'Classes/appClasses/User.php';

		$user =  new User();

		$this->assertEquals('myname', $user->getName());
	}
}
?>