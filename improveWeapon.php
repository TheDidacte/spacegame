<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

$g->getPlayer()[$g->getTurn()]->getSpaceships()[$g->getPlayers()[$g->getTurn()]->getActive()]->getWeapons()[intval($_POST['id'])]->addCharge();

$_SESSION['game'] = serialize($g);

?>
