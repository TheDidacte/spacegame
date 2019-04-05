<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

if ($g->getPlayers()[$g->getTurn()]->getPP() > 0)
{
	$g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->addShield();
	$g->getPlayers()[$g->getTurn()]->setPP($g->getPlayers()[$g->getTurn()]->getPP() - 1);
}

echo $g->getPlayers()[$g->getTurn()]->getPP();

$_SESSION['game'] = serialize($g);

?>
