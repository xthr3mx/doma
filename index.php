<html>
<head>
  <title>Contacto</title>
</head>
<body>

	<form method="post" action="index.php">
		<label for="nombre">Nombe</label>
		<input type="text" name="nombre" id="nombre" />
		<br />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" />
		<br />
		<label for="comentario">Comentario</label>
		<textarea rows="5" cols="20" id="comentario" name="comentario"></textarea>
		<br />
		<input type="submit" name="submit" value="Enviar" />
	</form>

<?php 
	$db_host = "127.0.0.1";
	$db_username = "d3m0";
	$db_password = 'd3_m05$eR.';
	$db_name = "demo";
	$connection = null;
	
	try{
		$connection = new mysqli($db_host,$db_username,$db_password,$db_name);

		// check connection
		if($connection->connect_error){
			trigger_error('Database connection failed: '+$connection->connect_error, E_USER_ERROR);
		}

		if(!empty($_POST)){
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$comentario = $_POST['comentario'];
			$sql_command = "INSERT INTO comentarios (nombre,email,comentario) VALUES ('$nombre', '$email', '$comentario')";

			if ($connection->query($sql_command)===false){
				trigger_error('Wrong SQL: '.$sql_command.' Error: '.$connection->error,E_USER_ERROR);
			}else{
				$last_inserted_id = $connection->insert_id;
				$affected_rows = $connection->affected_rows;
				if($affected_rows==1){
					echo "<h4>El Comentario fue enviado. Muchas gracias por compartir.</h4>";
				}else{
					echo "<h4>Ocurrio un problema al intentar enviar el comentario. Por favor intentarlo mas tarde o contacte al administrador.</h4>";
				}
			}

		}else{
			echo "<h3>No existen comentarios.</h3>"; 
		}

		$connection = null;

	}catch(Exception $exception){
		echo $exception;
	}
	
	
?>

</body>
</html>
