

function drawSpaceship(pos, size, color)
{
	for (var i = 0; i < size[0]; i++)
		for (var j = 0; j < size[1]; j++)
			$('#game div:nth-child(' + (pos[0] + i + 1 + 150 * (pos[1] + j)) + ')').addClass(color);
}

function getSpaceshipPos()
{
	$.post('getSpaceshipPos.php', {}, function(data){
		var players = data.split('&');
		for (var i = 0; i < players.length - 1; i++)
		{
			var ships = players[i].split(';');
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
				drawSpaceship(pos, size, col);
				console.log(pos);
			}
		}
	});
}
