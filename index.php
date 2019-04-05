<?php
include_once('draw.php');
?>
<html>

<head>
<title>My space game</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="style/style.css">
</head>

<body>

<div id="game">

<?php draw_board(); ?>

</div>

<div id="turn"></div>
<div id="player_turn"></div>
<div id="next_phase" class="unselectable" onclick="nextPhase();">></div>

<div id="orders" style="display: none">
<div id="points"></div>
<div id="speed" onclick="improveSpeed()">Speed</div>
<div id="shield" onclick="improveShield()">Shield</div>
<div id="life">Health</div>
</div>

</body>

<script src="logic.js"></script>

</html>
