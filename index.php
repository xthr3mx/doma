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

	try{
		$connection = new PDO("mysql:host=$host;dbname=$database_name",$username,$password);
		$connection->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $exception){
		die(var_dump($exception)),
	}
	if(!empty($_POST))
	{
		try{
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$fecha = date("Y-m-d");
			$sql_insert = "INSERT INTO registros (nombre,email,fecha) VALUES (?,?,?)";
			$stmt=$connection->prepare($sql_insert);
			$stmt->bindValue(1,$nombre);
			$stmt->bindValue(2,$email);
			$stmt->bindValue(3,$fecha);
			$stmt->execute();
			echo "<h3>Se ha registrado.</h3>";
		}catch(Exception $exception){
			echo "<h3>No se pudo registrar.</h3>";
			die(var_dump($exception));
		}
	}
	/*
	$sql_select = "SELECT * FROM registros";
	$stmt = $connection->query($sql_select);
	$registrosSql = $stmt->fetchAll();
	if(count($registrosSql)>0){
		echo 	"<h2>Personas registradas:</h2>";
		echo	"<table>";
		echo	"<tr>";
		echo	"<td>Nombre</td>";
		echo	"<td>Email</td>";
		echo	"<td>Fecha</td>";
		echo	"</tr>";
		foreach($registro as $registrosSql){
			echo 	"<tr>";
			echo	"<td>".$registro['nombre']."</td>";
			echo	"<td>".$registro['email']."</td>";
			echo	"<td>".$registro['fecha']."</td>";
			echo	"</tr>";
		}
		echo 	"</table>";
	}
	else{ echo "<h3>No existen registros.</h3>"; }
	*/
	$connection = null;
	

?>

</body>
</html>
