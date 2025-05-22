<?php
	$host = "sql109.epizy.com";
	$user = "epiz_26771597";
	$pass = "gvQHMVqXHNUXyA";
	$banco = "epiz_26771597_login";

	$conexao = mysqli_connect($host, $user, $pass, $banco);

	if (!$conexao) {
	 echo "Connection Error". PHP_EOL;
	 echo "Error Code: ". mysqli_connect_errno().PHP_EOL;
	 echo "Error: Description".mysqli_connect_error().PHP_EOL;
	 exit;
	}
?>