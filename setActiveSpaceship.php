<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

$g->getPlayers()[$g->getTurn()]->setActive($_POST['id']);

$_SESSION['game'] = serialize($g);

?>
