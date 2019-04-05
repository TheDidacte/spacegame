<?php

require_once('Spaceship.class.php');

Class Player
{
	private $_name;
	private $_spaceships;
	private $_turn;
	private $_active;
	private $_pp;
	private $_hasMove;

	const ORDER = 0;
	const MOVE = 1;
	const SHOOT = 2;

	public static function doc()
		    {
				        echo file_get_contents('Player.doc.txt');
						    }

	public function __construct($name)
	{
		$this->_name = $name;
		$this->_spaceships = array();
		$this->_turn = self::ORDER;
		$this->_active = -1;
		$this->_hasMove = 0;
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

	public function getTurn()
	{
		return $this->_turn;
	}

	public function setTurn($t)
	{
		$this->_turn = $t;
	}

	public function getPP()
	{
		return $this->_pp;
	}

	public function setPP($pp)
	{
		$this->_pp = $pp;
	}

	public function getActive()
	{
		return $this->_active;
	}

	public function setActive($a)
	{
		$this->_active = $a;
	}

	public function improveSpeed()
	{
		$this->_speedBonus++;
	}

	public function getSpeedBonus()
	{
		return $this->_speedBonus;
	}

	public function setMove($m)
	{
		$this->_hasMove = $m;
	}

	public function getMove()
	{
		return $this->_hasMove;
	}
}

?>
