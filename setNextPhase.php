<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

echo $g->getTurn() . ':' . $g->getPlayers()[$g->getTurn()]->getTurn() . PHP_EOL;

if ($g->getPlayers()[$g->getTurn()]->getTurn() === Player::SHOOT)
{
	$g->getPlayers()[$g->getTurn()]->setTurn(Player::ORDER);
	$g->setTurn(($g->getTurn() + 1) % count($g->getPlayers()));
}
else if ($g->getPlayers()[$g->getTurn()]->getTurn() === Player::ORDER)
	$g->getPlayers()[$g->getTurn()]->setTurn(Player::MOVE);
else
	$g->getPlayers()[$g->getTurn()]->setTurn(Player::SHOOT);

echo $g->getTurn() . ':' . $g->getPlayers()[$g->getTurn()]->getTurn();
$_SESSION['game'] = serialize($g);

?>
