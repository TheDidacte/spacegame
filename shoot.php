<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

$x = intval($_POST['x']);
$y = intval($_POST['y']);

$ship = $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()];
$weapon = $ship->getWeapons()[0];


foreach ($g->getPlayers() as $p_id => $p)
{
	foreach ($p->getSpaceships() as $s_id => $s)
	{
		for ($k = 0; $k < $s->getSize()[0]; $k++)
		{
			for ($l = 0; $l < $s->getSize()[1]; $l++)
			{
				if ($x === $s->getPos()[0] + $k
					&& $y === $s->getPos()[1] + $l)
				{
					$touched = array($p_id, $s_id);
					$dist = sqrt(($ship->getPos()[0] - $x) * ($ship->getPos()[0] - $x) + ($ship->getPos()[1] - $y) * ($ship->getPos()[1] - $y));
					if ($dist < $weapon->getRanges()[2])
						echo 'touch';
				}
			}
		}
	}
}

if ($dist)

	echo $dist;

?>
