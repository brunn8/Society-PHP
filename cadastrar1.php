<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" href="src/logo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Society | Cadastro</title>
    <meta name="description" content="Loja de Roupas">
    <meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
    <meta property="og:description" content="Produtos Socety Store">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Society Store">
    <meta property="og:title" content="Society Store Cadastrar">
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
        });
      </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div style="height: 100vh; width: 100%; position: absolute; display: inline-flex; background-image:url('src/login.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-position: top;background-size: auto">
        <div id="cadast">
            <h1>Cadastro</h1>
            <form method="post" action="cadastrar.php" name="cadastrar" onsubmit="return captcha();">
                <fieldset>
                    <input name="nome" type="text" id="nome" placeholder="Nome" required>
                </fieldset>
                <fieldset>
                    <input name="email" type="text" id="email" placeholder="E-Mail" required>
                </fieldset>
                <fieldset>
                    <input name="pass" type="password" id="pass" placeholder="Senha" required>
                </fieldset>
                <fieldset>
                    <input name="passd" type="password" id="passd" placeholder="Confirme a Senha" required>
                </fieldset>
                <fieldset id="fnone">
                    <div class="g-recaptcha" data-sitekey="6LfdEZAaAAAAAF8vdbukpjVw5c57BwwvpYItCFTx" required></div>
                </fieldset>
                <fieldset id="fnone">
                    <input class="logar" type="submit" value="Cadastrar" name="cadastrar"></input>
            </fieldset>
        </form>
        <a href="login.php">
            <p>Fazer login</p>
        </a>
        <?php
        if (isset($_SESSION['msg'])) {
          $erro = $_SESSION['msg'];
          echo "<p style='color: #f00; text-decoration:none;'>$erro</p>";
          unset($_SESSION['msg']);
        } ?>
    </div>
  </div>
</body>
</html>