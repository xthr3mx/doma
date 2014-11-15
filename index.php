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
	$db_username = "d3m0x";
	$db_password = 'd3_m05$eR.';
	$db_name = "demo";
	
	try{
		$connection = new mysqli($db_host,$db_username,$db_password,$db_name);

		// check connection
		if($connection->connect_error){
			trigger_error('Database connection failed: '+$connection->connect_error, E_USER_ERROR);
		}

		echo "NEVER GIVE UP! :-D";

	}catch(Exception $e){
		echo $e;
	}
	
	
?>

</body>
</html>
