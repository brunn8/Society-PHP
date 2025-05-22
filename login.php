<?php
session_start();
if (!isset($_SESSION['email'])) {
} else {
  header('Location:user.php');
  exit();
}
?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
  <link rel="stylesheet" href="estilo.css">
  <link rel="icon" href="src/logo.png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Society | Login</title>
  <meta name="description" content="Loja de Roupas">
  <meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
  <meta property="og:description" content="Produtos Socety Store">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Society Store">
  <meta property="og:title" content="Society Store Login">
  <script type="text/javascript">
    $(document).ready(function() {
      var prevScrollpos = window.pageYOffset;
      var led = window.pageYOffset;
      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("nav").style.top = "0";
        } else {
          document.getElementById("nav").style.top = "-60px";
        }
        prevScrollpos = currentScrollPos;
      }
      $(window).scroll(function() {

        console.log($(window).scrollTop());

        if ($(window).scrollTop() > 30) {
          $('#nav').addClass('navfix');
        }

        if ($(window).scrollTop() < 31) {
          $('#nav').removeClass('navfix');
        }
      });

      function captcha() {
        var recaptchaRes = grecaptcha.getResponse();
        if (recaptchaRes.length == 0) {
          alert('Preencha o CAPTCHA antes de prosseguir');
          return false;
        } else {
          return true;
        }
      }
    });
  </script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <?php
  include "conectar.php";
  ?>
  <?php
  $email = $_POST['email'];
  $entrar = $_POST['login'];
  $pass = $_POST['pass'];
  if (isset($entrar)) {
    $verifica = mysqli_query($conexao, "SELECT * FROM `Clientes` WHERE email ='$email' AND pass = '$pass'") or die("erro");
    if (mysqli_num_rows($verifica) <= 0) {
      $_SESSION['msg'] = "Senha e/ou e-mail errado(s)";
      header("Location:login.php");
      exit();
    } else {
      setcookie("login", $login);
      session_start();
      $id = mysqli_query($conexao, "SELECT * FROM `Clientes` WHERE email ='$email' AND pass = '$pass'");
      while ($row = mysqli_fetch_assoc($id)) {
        $_SESSION['nome'] = $row["nome"];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pass'] = $row['pass'];
      }
      header("Location:user.php");
      exit();
    }
  }
  ?>
  <div style="height: 100vh; width: 100%;position: absolute;display: inline-flex;">
    <div id="leftl">
    </div>
    <div id="login">
      <h1>Login</h1>
      <form method="post" action="login.php" name="login" onsubmit="return captcha()">
        <fieldset>
          <input name="email" type="text" id="email" placeholder="E-Mail" required>
        </fieldset>
        <fieldset>
          <input name="pass" type="password" id="pass" placeholder="Senha" required>
        </fieldset>
        <fieldset id="fnone">
          <div class="g-recaptcha" data-sitekey="6LfdEZAaAAAAAF8vdbukpjVw5c57BwwvpYItCFTx"></div>
        </fieldset>
        <fieldset id="fnone">
          <input class="logar" type="submit" value="Logar" name="login"></input>
        </fieldset>
        <?php
        if (isset($_SESSION['msg'])) {
          $erro = $_SESSION['msg'];
          echo "<p style='color: #f00; text-decoration:none;'>$erro</p>";
          unset($_SESSION['msg']);
        } ?>
      </form>
      <a href="cadastrar1.php">
        <p>Cadastrar-se</p>
      </a>
      <a href="index.php">
        <p style="margin-top: 0.5vh">Voltar à home</p>
      </a>
    </div>
  </div>
</body>

</html>