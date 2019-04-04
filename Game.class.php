<?php

require_once('Player.class.php');

Class Game
{
	private $_board;
	private $_players;
	private $_turn;

	const VOID = 0;
	const ROCK = 1;

	private function _createBoard()
	{
		$this->_board = array();
		for ($i = 0; $i < 100; $i++)
		{
			$this->_board[] = array();
			for ($j = 0; $j < 150; $j++)
				$this->_board[$i][] = self::VOID;
		}
	}

	public function __construct()
	{
		$this->_createBoard();
		$this->_players = array();
		$this->_turn = 0;
	}

	public function addPlayer(Player $p)
	{
		$this->_players[] = $p;
	}

	public function initSpaceshipsPos()
	{
		if (count($this->_players) > 1)
		{
			$pos = 0;
			foreach ($this->_players[0]->getSpaceships()as $e)
			{
				$e->setPos(array(0, $pos));
				$pos += $e->getSize()[1];
			}
			$pos = 99;
			foreach ($this->_players[1]->getSpaceships()as $e)
			{
				$e->setPos(array(150 - $e->getSize()[0], $pos));
				$pos -= $e->getSize()[1];
			}
		}
	}

	public function __toString()
	{
		$s = 'Players:' . PHP_EOL;
		$s = $s . $this->_players[0]->getName() . PHP_EOL;
		$s = $s . $this->_players[1]->getName() . PHP_EOL;
		return ($s);
	}

	public function getBoard()
	{
		return $this->_board;
	}

	public function getPlayers()
	{
		return $this->_players;
	}
}

?>
