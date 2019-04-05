<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

foreach ($g->getPlayers() as $p)
{
	echo $p->getName() . ';';
}
?>
