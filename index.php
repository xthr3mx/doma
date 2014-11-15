<html>
<head>
  <title>Demo</title>
</head>
<body>

	<form method="post" action="index.php">
		<label for="nombre">Nombe</label>
		<input type="text" name="nombre" id="nombre" />
		<br />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" />
		<br />
		<input type="submit" name="submit" value="Registrar" />
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
			$sql_command = "INSERT INTO alumnos (nombre,email) VALUES ('$nombre', '$email')";

			if ($connection->query($sql_command)===false){
				trigger_error('Wrong SQL: '.$sql_command.' Error: '.$connection->error,E_USER_ERROR);
			}else{
				$last_inserted_id = $connection->insert_id;
				$affected_rows = $connection->affected_rows;
			}

		}else{
			echo "<h3>No existen registros.</h3>"; 
		}

		$connection = null;

	}catch(Exception $exception){
		echo $exception;
	}
	
	
?>

</body>
</html>
