<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

if ($g->getPlayers()[$g->getTurn()]->getMove() === 0)
{
	$x = intval($_POST['x']);
	$y = intval($_POST['y']);
	if ($x === $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getPos()[0])
	{
		if (abs($y - $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getPos()[1]) < $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getSpeed() + $g->getPlayers()[$g->getTurn()]->getSpeedBonus())
		{
			$g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->setPos(array($x, $y));
			$g->getPlayers()[$g->getTurn()]->setMove(1);
			echo "1";
		}
	}
	else if ($y === $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getPos()[1])
	{
		if (abs($x - $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getPos()[0]) < $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getSpeed() + $g->getPlayers()[$g->getTurn()]->getSpeedBonus())
		{
			$g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->setPos(array($x, $y));
			$g->getPlayers()[$g->getTurn()]->setMove(1);
			echo "1";
		}
	}
}

$_SESSION['game'] = serialize($g);

?>
