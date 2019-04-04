<?php

require_once('Spaceship.class.php');
require_once('Lance.class.php');

Class FregateImperial extends Spaceship
{
	public function __construct($name)
	{
		$this->_size = array(4, 1);
		$this->_life = 5;
		$this->_powerPoint = 10;
		$this->_speed = 15;
		$this->_maneuver = 4;
		$this->_shield = 0;
		$this->_idle = True;
		$this->_weapons = array(new Lance('SuperLance'));
		$this->_name = $name;
	}
}

?>
