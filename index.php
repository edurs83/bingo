<!DOCTYPE>
<html lang="es">
<head>
	<title>Eduardo-Bingo</title>
	<meta charset="utf-8">
</head>
<body>

	<?php
		echo '<table border="1">';
			for ($i=0; $i<11; $i++) 
			{
				echo '<tr>';
				for ($j=0; $j<9; $j++) 
				{
					if ($j == 0 && $i == 9) 
						echo '<td></td>';
					else if($j <> 8 && $i == 10)
						echo '<td></td>';
					else 
					{
						if ($j == 0)
							$k = $j*10 + $i + 1;
						else
							$k = $j*10 + $i;
							echo '<td>'.$k.'</td>';
					}
				}
					echo '</tr>';	
			}
		echo '</table>';
	?>

</body>
</html>