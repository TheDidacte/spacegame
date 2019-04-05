<?php


session_start();
require_once('Game.class.php');
require_once('FregateImperial.class.php');

$game = new Game();

$player1 = new Player('Boris');
$player1->addSpaceship(new FregateImperial('My Spaceship'));
$player1->addSpaceship(new Cuirasse('My Cuirasse'));
$player1->addSpaceship(new Roug('So small'));
$player1->addSpaceship(new Cuirasse('My Cuirasse 2'));
$player1->addSpaceship(new FregateImperial('My Spaceship2'));
$game->addPlayer($player1);

$player2 = new Player('Kruchk');
$player2->addSpaceship(new FregateImperial('Blut'));
$player2->addSpaceship(new Cuirasse('My Cuirasse'));
$player2->addSpaceship(new Roug('So small'));
$player2->addSpaceship(new Cuirasse('My Cuirasse 2'));
$player2->addSpaceship(new FregateImperial('My Spaceship2'));
$game->addPlayer($player2);

$game->initSpaceshipsPos();

$_SESSION['game'] = serialize($game);
?>
