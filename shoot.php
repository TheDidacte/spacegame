<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

$x = intval($_POST['x']);
$y = intval($_POST['y']);

$ship = $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()];
$weapon = $ship->getWeapons()[0];

if ($weapon->getCharge() === 0)
{
	echo 3;
	exit ;
}

$dice = rand(1, 6);

$g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getWeapons()[0]->removeCharge();

$_SESSION['game'] = serialize($g);

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
					{

						if ($dist < $weapon->getRanges()[1])
							$dice++;
						if ($dice < $weapon->getRanges()[0])
							$dice++;
						if ($dice < 6)
						{
							echo '1' . strval($dice);
							exit ;
						}
						$dead = $g->getPlayers()[$p_id]->getSpaceships()[$s_id]->damage();
						echo $dead;
						$_SESSION['game'] = serialize($g);
					}
				}
			}
		}
	}
}

?>
