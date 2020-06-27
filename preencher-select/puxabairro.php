<?php include_once("includes/conexao.php");

	$id_categoria = utf8_decode($_REQUEST['cidade']);
	
	$query = "SELECT * FROM bairro WHERE cidade='$id_categoria' ORDER BY nome";
	$resul = mysqli_query($conn, $query);
	
	while ($row_bai = mysqli_fetch_assoc($resul) ) {
		$bairro[] = array(
			'id'	=> $row_bai['id'],
			'nome' => utf8_encode($row_bai['nome']),
		);
	}
	
	echo(json_encode($bairro));
