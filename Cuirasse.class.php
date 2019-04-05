<?php

require_once('Spaceship.class.php');
require_once('Lance.class.php');

Class Cuirasse extends Spaceship
{
	public static function doc()
	{
		echo file_get_contents('FregateImperial.doc.txt');
	}

	public function __construct($name)
	{
		$this->_size = array(7, 2);
		$this->_life = 8;
		$this->_powerPoint = 12;
		$this->_speed = 10;
		$this->_maneuver = 5;
		$this->_shield = 2;
		$this->_idle = True;
		$this->_weapons = array(new Lance('SuperLance'));
		$this->_name = $name;
		$this->_activated = 0;
	}
}

?>
