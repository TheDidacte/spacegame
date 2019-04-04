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

</body>

<script src="logic.js"></script>

</html>
