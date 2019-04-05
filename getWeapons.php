<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

$weapons = $g->getPlayers()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getWeapons();

foreach ($weapons as $k => $e)
{
	echo '<div class="weapon" onclick="improveWeapon('.intval($k).')">'.$e->getName().'</div>' . PHP_EOL;
}

?>
