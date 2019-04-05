<?php

require_once("Player.class.php");

Interface IGame
{
	public function addPlayer(Player $p);
	public function getPlayers();
	public function getBoard();
	public function getTurn();
}
