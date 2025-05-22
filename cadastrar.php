<?php
include "conectar.php";
?>
<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$nome = $_POST['nome'];
$passd = $_POST['passd'];
if ($pass != $passd) {
  $_SESSION['msg'] = "Senhas não são iguais";
  header("Location:cadastrar1.php");
  exit();
} else {
  $verifica = mysqli_query($conexao, "SELECT * FROM Clientes WHERE email ='$email'");
  if (mysqli_num_rows($verifica) >= 1) {
    $_SESSION['msg'] = "E-Mail já cadastrado";
    header("Location:cadastrar1.php");
    exit();
    mysqli_close($conexao);
  } else {
    $sql = mysqli_query($conexao, "INSERT INTO Clientes(nome, email, pass) VALUES ('$nome','$email','$pass')");
    if ($sql === true) {
      $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
      header("Location:login.php");
      exit();
    } else {
      $_SESSION['msg'] = "Erro ao cadastrar";
      header("Location:cadastrar1.php");
      exit();
    }
    mysqli_close($conexao);
  }
}
?>