<?php 

/*
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

		}

		$sql_select = "SELECT * FROM comentarios";
		$resultset=$connection->query($sql_select);

		if($resultset===false){
			trigger_error('Wrong SQL: '.$sql_select.' Error: '.$connection->error, E_USER_ERROR);		
		}else{

			if($resultset->num_rows >= 1){
				echo "<table>";
				echo "<tr>";
				echo "<td>Nombre</td>";
				echo "<td>Email</td>";
				echo "<td>Comentario</td>";
				echo "<td>Fecha</td>";
				echo "</tr>";
				while($row = $resultset->fetch_assoc()){
					//echo "id->".$row['id']." nombre->".$row['nombre']." comentario->".$row['comentario']."fecha->".$row['fecha']."<br />";
					echo "<tr>";
						echo "<td>".$row['nombre']."</td>";
						echo "<td>".$row['email']."</td>";
						echo "<td>".$row['comentario']."</td>";
						echo "<td>".$row['fecha']."</td>";
					echo "<tr>";
				}
				echo "</table>";
			}else{
				echo "<h4>No tenemos comentarios para mostrar.</h4>";
			}

		}

		$connection = null;

	}catch(Exception $exception){
		echo $exception;
	}
	
*/
	
$data = array();
$data["error"] => "esto es un error.";	
echo json_encode($data);

?>

