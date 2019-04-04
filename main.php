<?php


session_start();
require_once('Game.class.php');
require_once('FregateImperial.class.php');

$game = new Game();

$player1 = new Player('Boris');
$player1->addSpaceship(new FregateImperial('My Spaceship'));
$game->addPlayer($player1);

$player2 = new Player('Kruchk');
$player2->addSpaceship(new FregateImperial('Blut'));
$game->addPlayer($player2);

$game->initSpaceshipsPos();

$_SESSION['game'] = serialize($game);
?>
