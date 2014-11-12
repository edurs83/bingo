<?php
	session_name("Bingo");
	session_start();

	if(isset($_POST["Nuevo_juego"])){
		session_destroy();
		session_start();
	}

	if (!isset($_SESSION['numeros'])) {
		$_SESSION['numeros'] = array();
	}

	if (!isset($_SESSION['x'])) {
		$_SESSION['x'] = 0;
	}
	if (!isset($_SESSION['texto'])) {
		$_SESSION['texto'] = '<span id="inicio"/>';
	}
	
	if (isset($_POST['obtener_numero'])) {
		do {
           	$_SESSION['x'] = rand(1, 90);
        } while (in_array($_SESSION['x'], $_SESSION['numeros'])); 
		array_push($_SESSION['numeros'], $_SESSION['x']);
		$_SESSION['texto'] = '<span id="numero_actual">'.$_SESSION['x'].'</span>';
	}
?>


<!DOCTYPE>
<html lang="es">
<head>
	<title>Eduardo-Bingo</title>
	<link rel="stylesheet" type="text/css" href="bingo.css"/>
	<meta charset="utf-8">
</head>
<body>
	<form action="index.php" method="post">
	<?php
		echo '<label>'.$_SESSION['texto'].'</label>';
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
							if (!in_array($k, $_SESSION['numeros']))
							echo '<td>'.$k.'</td>';
							else {
								if ($k == $_SESSION['x'])
									echo '<td class="numero_rojo">'.$k.'</td>';
								else
									echo '<td class="numero_amarillo">'.$k.'</td>';
							}
					}
				}
					echo '</tr>';	
			}
		echo '</table>';
	?>

	<button type="submit" name="obtener_numero" 
		<?php 
			if(count($_SESSION['numeros']) == 90) 
				echo 'disabled'; 
				else echo 'enabled'; 
		?>
		>Obtener Numero
	</button>
	<button type="submit" name="Nuevo_juego">Nuevo Juego</button>
	</form>
</body>
</html>