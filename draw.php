<?php

include_once('main.php');

$b = $game->getBoard();

function draw_board()
{
	global $b;
	for ($i = 0; $i < 100; $i++)
	{
		for ($j = 0; $j < 150; $j++)
		{
			//echo $b[$i][$j] . PHP_EOL;
			if ($b[$i][$j] === Game::VOID)
				echo '<div class="tile void"></div>' . PHP_EOL;
			else if ($b[$i][$j] === Game::ROCK)
				echo '<div class="tile rock"></div>' . PHP_EOL;
		}
	}
}

?>
