<?php

require_once('Weapon.class.php');

Class Spaceship
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

	public function __construct(array $arr)
	{

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
}

?>
