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
	$host = "127.0.0.1";
	$username = "d3m0";
	$password = "d3_m05$eR.";
	$database_name = "demo";
	
	try{
		echo "test";
	}catch(Exception $e){
		echo $e;
	}
	
	
?>

</body>
</html>
