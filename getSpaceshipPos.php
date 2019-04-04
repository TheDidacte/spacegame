<?php

session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

foreach ($g->getPlayers() as $p)
{
	foreach ($p->getSpaceships() as $s)
	{
		echo $s->getPos()[0] . ':' . $s->getPos()[1] . '.';
		echo $s->getSize()[0] . ':' . $s->getSize()[1] . ';';
	}
	echo '&';
}

?>
