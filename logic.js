
var players = [];
var turn = 0;
var player_turn = 0;
var selectedShip = 0;

function drawSpaceship(pos, size, color)
{
	for (var i = 0; i < size[0]; i++)
		for (var j = 0; j < size[1]; j++)
			$('#game div:nth-child(' + (pos[0] + i + 1 + 150 * (pos[1] + j)) + ')').addClass(color);
}

function getPlayers()
{
	$.post('getPlayers.php', {}, function (data){
		var d = data.split(';');
		for (var i = 0; i < d.length - 1; i++)
			players.push([d[i], []]);
		getSpaceshipPos();
	});
}

function getSpaceshipPos()
{
	$.post('getSpaceshipPos.php', {}, function(data){
		var play = data.split('&');
		for (var i = 0; i < play.length - 1; i++)
		{
			var ships = play[i].split(';');
			for (var j = 0; j < ships.length - 1; j++)
			{
				var data = ships[j].split('.');
				var pos = data[0].split(':');
				var size = data[1].split(':');
				var col = i ? 'red' : 'blue';
				pos[0] = parseInt(pos[0]);
				pos[1] = parseInt(pos[1]);
				size[0] = parseInt(size[0]);
				size[1] = parseInt(size[1]);
				players[i][1].push([pos, size, data[2]]);
				drawSpaceship(pos, size, col);
			}
		}
	});
}

function getSpaceshipFromTile(index)
{
	var i = index % 150;
	var j = Math.floor(index / 150);
	var k = turn;
	//for (var k = 0; k < players.length; k++)
	//{
		for (var l = 0; l < players[k][1].length; l++)
		{
			for (m = 0; m < players[k][1][l][1][0]; m++)
			{
				for (n = 0; n < players[k][1][l][1][1]; n++)
				{
					if (players[k][1][l][0][0] + m == i && players[k][1][l][0][1] + n == j)
						return [k, l]; // Return player's id and spaceship id in his spaceship list
				}
			}
		}
	//}
	return -1;
}

function updatePlayerTurn()
{
	$.post('getPlayerTurn.php', {id: turn}, function(res){
		var t = parseInt(res);
		if (res == 0)
		{
			$('#player_turn')[0].innerHTML = 'ORDER PHASE';
			$('.selected').removeClass('selected');
			selectedShip = 0;
		}
		else if (res == 1)
			$('#player_turn')[0].innerHTML = 'MOVEMENT PHASE';
		else if (res == 2)
			$('#player_turn')[0].innerHTML = 'SHOOTING PHASE';
		player_turn = t;
	});
}

function nextPhase()
{
	$.post('setNextPhase.php', {}, function (res){
		$('#orders').hide();
		console.log(res);
		updateTurn();
	});
}

function openPPMenu(x, y)
{
	console.log(x, y);
	$.post('setPlayerPP.php', {}, function (res) {
		loadWeapons();
		$('#points')[0].innerHTML = res + ' PP';
		$('#orders').show();
		$('#orders').css('left', (x + 1) * 10 + 'px');
		$('#orders').css('top', (y + 1) * 10 + 'px');
	});
}

function improveShield()
{
	$.post('improveShield.php', {}, function(res){
		$('#points')[0].innerHTML = res + ' PP';
	});
}

function improveSpeed()
{
	$.post('improveSpeed.php', {}, function(res){
		$('#points')[0].innerHTML = res + ' PP';
	});
}

function improveWeapon(id)
{
	$.post('improveWeapon.php', {id: parseInt(id)}, function(res){
		$.post('setPlayerPP.php', {remove: 1}, function(e){
			$('#points')[0].innerHTML = e + ' PP';
		});
	});
}

function loadWeapons()
{
	$.post('getWeapons.php', {}, function(res){
		$('#orders')[0].innerHTML += res;
	});
}

function onTileClick(index)
{
	if (player_turn == 1) //Movement
	{
		var i = index % 150;
		var j = Math.floor(index / 150);
		console.log(i, j);
		$.post('moveShip.php', {x: i, y: j}, function(e){
			console.log(e);
			if (parseInt(e) > 0)
			{
				players[turn][1] = [];
				$('#game div').removeClass('red');
				$('#game div').removeClass('blue');
				$('.selected').removeClass('selected');
				getSpaceshipPos();
				selectedShip[0][0] = i;
				selectedShip[0][1] = j;
				for (var k = 0; k < selectedShip[1][0]; k++)
					for (var l = 0; l < selectedShip[1][1]; l++)
						$('#game div:nth-child('+ (k + 1 + selectedShip[0][0] + 150 * (l + selectedShip[0][1])) +')').addClass('selected');
			}
		});
	}
	if (selectedShip != 0)
		return ;
	$('.selected').removeClass('selected');
	$('#orders')[0].innerHTML = '<div id="points"></div><div id="speed" onclick="improveSpeed()">Speed</div><div id="shield" onclick="improveShield()">Shield</div>	<div id="life">Health</div>';
	var spaceshipId = getSpaceshipFromTile(index);
	if (spaceshipId != -1)
	{
		var spaceship = players[spaceshipId[0]][1][spaceshipId[1]];
		for (var k = 0; k < spaceship[1][0]; k++)
			for (var l = 0; l < spaceship[1][1]; l++)
				$('#game div:nth-child('+ (k + 1 + spaceship[0][0] + 150 * (l + spaceship[0][1])) +')').addClass('selected');
		selectedShip = spaceship;
		$.post('setActiveSpaceship.php', {id: spaceshipId[1]}, function(res){});
		openPPMenu(spaceship[0][0] + spaceship[1][0], spaceship[0][1]);
	}
	else
		selectedShip = 0;
}

function updateTurn()
{
	$.post('getTurn.php', {}, function (data){
		$('#turn')[0].innerHTML = 'This is Player ' + (parseInt(data) + 1) + ' turn';
		turn = parseInt(data);
		updatePlayerTurn();
	});
}

getPlayers();
updateTurn();
