<?php

require_once('Player.class.php');
require_once('IGame.class.php');

Class Game implements IGame
{
	private $_board;
	private $_players;
	private $_turn;

	const VOID = 0;
	const ROCK = 1;

	public static function doc()
	{
		echo file_get_contents('Game.doc.txt');
	}

	private function _addRock($i, $j)
	{
		$this->_board[31 + $i][90 + $j] = self::ROCK;
		$this->_board[32 + $i][91 + $j] = self::ROCK;
		$this->_board[31 + $i][91 + $j] = self::ROCK;
		$this->_board[31 + $i][92 + $j] = self::ROCK;
	}

	private function _createBoard()
	{
		$this->_board = array();
		for ($i = 0; $i < 100; $i++)
		{
			$this->_board[] = array();
			for ($j = 0; $j < 150; $j++)
				$this->_board[$i][] = self::VOID;
		}
		$this->_board[47][50] = self::ROCK;
		$this->_board[48][50] = self::ROCK;
		$this->_board[49][51] = self::ROCK;
		$this->_board[48][51] = self::ROCK;
		$this->_board[49][50] = self::ROCK;
		$this->_board[48][49] = self::ROCK;
		$this->_board[50][49] = self::ROCK;
		$this->_board[50][50] = self::ROCK;
		$this->_board[49][49] = self::ROCK;
		$this->_board[51][50] = self::ROCK;
		$this->_board[52][50] = self::ROCK;
		$this->_board[51][47] = self::ROCK;
		$this->_board[50 + 47][-20 +48] = self::ROCK;
		$this->_board[50 +47][-20 +50] = self::ROCK;
		$this->_board[50 +48][-20 +50] = self::ROCK;
		$this->_board[50 +49][-20 +51] = self::ROCK;
		$this->_board[50 +48][-20 +51] = self::ROCK;
		$this->_board[50 +49][-20 +50] = self::ROCK;
		$this->_board[50 +48][-20 +49] = self::ROCK;
		$this->_board[50 +50][-20 +49] = self::ROCK;
		$this->_board[50 +50][-20 +50] = self::ROCK;
		$this->_board[50 +49][-20 + 49] = self::ROCK;
		$this->_board[31][90] = self::ROCK;
		$this->_board[32][91] = self::ROCK;
		$this->_board[31][91] = self::ROCK;
		$this->_board[31][92] = self::ROCK;
		$this->_addRock(10, 30);	
		$this->_addRock(20, 50);	
		$this->_addRock(90, 110);	
		$this->_addRock(90, 90);	
		$this->_addRock(40, 80);	
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
				$pos += $e->getSize()[1] + 1;
			}
			$pos = 99;
			foreach ($this->_players[1]->getSpaceships()as $e)
			{
				$e->setPos(array(150 - $e->getSize()[0], $pos));
				$pos -= $e->getSize()[1] - 1;
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

	public function getTurn()
	{
		return $this->_turn;
	}

	public function setTurn($t)
	{
		$this->_turn = $t;
	}

	public function __get($prop)
	{
		if ($prop === 'turn')
			return $this->_turn;
	}

	public function __set($prop, $val)
	{
		if ($prop === 'turn')
			$this->_turn = intval($val);
	}
}

?>
