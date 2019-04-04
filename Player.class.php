<?php

require_once('Spaceship.class.php');

Class Player
{
	private $_name;
	private $_spaceships;
	private $_turn;
	private $_active;

	const ORDER = 0;
	const MOVE = 1;
	const SHOOT = 2;

	public function __construct($name)
	{
		$this->_name = $name;
		$this->_spaceships = array();
		$this->_turn = self::ORDER;
		$this->_active = -1;
	}

	public function addSpaceship(Spaceship $s)
	{
		$this->_spaceships[] = $s;
	}

	public function getSpaceships()
	{
		return $this->_spaceships;
	}

	public function getName()
	{
		return $this->_name;
	}
}

?>
