<?php

require_once('Spaceship.class.php');
require_once('Lance.class.php');

Class Roug extends Spaceship
{
	public static function doc()
	{
		echo file_get_contents('FregateImperial.doc.txt');
	}

	public function __construct($name)
	{
		$this->_size = array(2, 1);
		$this->_life = 4;
		$this->_powerPoint = 10;
		$this->_speed = 19;
		$this->_maneuver = 3;
		$this->_shield = 0;
		$this->_idle = True;
		$this->_weapons = array(new Lance('SuperLance'));
		$this->_name = $name;
		$this->_activated = 0;
	}
}

?>
