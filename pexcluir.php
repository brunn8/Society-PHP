<?php
include "conectar.php";
$char = mysqli_query($conexao, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$id = $_GET['id'];
$query = mysqli_query($conexao, "DELETE FROM Produtos WHERE id='$id'");
if ($query === TRUE) {
    $_SESSION['msg'] = "Sucesso ao editar informações";
} else {
    $_SESSION['msg'] = "Falha ao editar informações";
}
header("Location:painel.php");
exit();
mysqli_close($conexao);
?>