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
	$host = "us-cdbr-azure-northcentral-a.cleardb.com";
	$username = "b8e21eb547cfc6";
	$password = "d4494e32";
	$database_name = "demodomsav1";
	
	echo "test";
	try{
		echo "test";
		$connection = new PDO("mysql:host=$host;dbname=$database_name",$username,$password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}
	//catch(Exception $exception){
	//	die(var_dump($exception)),
	//}
	
?>

</body>
</html>
