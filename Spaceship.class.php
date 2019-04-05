<?php

require_once('Weapon.class.php');

abstract Class Spaceship
{
	protected $_name;
	protected $_size;
	protected $_pos;
	protected $_sprite;
	protected $_life;
	protected $_powerPoint;
	protected $_speed;
	protected $_maneuver;
	protected $_shield;
	protected $_weapons;
	protected $_idle;
	protected $_activated;

	public static function doc()
	{
		echo file_get_contents('Spaceship.doc.txt');
	}

	public function getPos()
	{
		return $this->_pos;
	}

	public function setPos($p)
	{
		$this->_pos = $p;
	}

	public function getSize()
	{
		return $this->_size;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getPowerPoint()
	{
		return $this->_powerPoint;
	}

	public function getWeapons()
	{
		return $this->_weapons;
	}

	public function addShield()
	{
		$this->_shield++;
	}

	public function getSpeed()
	{
		return $this->_speed;
	}

	public function reset()
	{
		$this->_hasMove = 0;
		echo 'pute';
	}
}

?>
