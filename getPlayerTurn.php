<?php
session_start();

require_once('Game.class.php');
require_once('FregateImperial.class.php');

$g = unserialize($_SESSION['game']);

if (isset($_POST['id']))
{
	echo $g->getPlayers()[intval($_POST['id'])]->getTurn();
}

?>
