<?php
	$host = "HOST";
	$user = "USER";
	$pass = "SENHA";
	$banco = "BANCO";

	$conexao = mysqli_connect($host, $user, $pass, $banco);

	if (!$conexao) {
	 echo "Connection Error". PHP_EOL;
	 echo "Error Code: ". mysqli_connect_errno().PHP_EOL;
	 echo "Error: Description".mysqli_connect_error().PHP_EOL;
	 exit;
	}
?>
