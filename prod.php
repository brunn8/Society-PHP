<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  include "conectar.php";
  $char = mysqli_query($conexao, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  ?>
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
  <title>Society |
    <?php
    $idnow = $_GET['id'];
    $records = mysqli_query($conexao, "SELECT * FROM `Produtos` WHERE id ='$idnow'");
    $data = mysqli_fetch_array($records);
    echo $data['dropname'];
    ?></title>
  <meta name="description" content="Loja de Roupas">
  <meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
  <meta property="og:description" content="Produtos Socety Store">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Society Store">
  <meta property="og:title" content="Society | <?php echo $data['dropname']; ?>">
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
</head>

<body>
  <nav id="nav">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo2b">
      <a href="index.php"><img rel="logo" src="src/logo.png"></a>
    </label>
    <ul class="btn2b">
      <div class="nactive">
        <li class="sidespace"><a href="index.php">Home</a></li>
        <li class="sidespace"><a href="produtos.php">Produtos</a></li>
      </div>
      <li id="user"><a href="login.php"><i class="far fa-user-circle"></i></a></li>
    </ul>
  </nav>
  <div class="main">
    <div class="ka1">
      <?php
      echo "<div id='";
      echo $data['class'];
      echo "p' class='carousel carousel-dark slide' data-bs-ride='carousel' data-bs-pause='false'>";
      echo "<div class='carousel-indicators'>";
      $num = (int)$data['numfile'];
      $x = 0;
      while ($x < $num) {
        if ($x == 0) {
          echo "<button type='button' data-bs-target='#";
          echo $data['class'];
          echo "p' data-bs-slide-to='";
          echo $x;
          echo "' class='active' aria-current='true' aria-label='Slide ";
          echo ($x + 1);
          echo "'></button>";
        } else {
          echo "<button type='button' data-bs-target='#";
          echo $data['class'];
          echo "p' data-bs-slide-to='";
          echo $x;
          echo "' aria-label='Slide ";
          echo ($x + 1);
          echo "'></button>";
        }
        $x++;
      }
      ?>
    </div>
    <div class="carousel-inner">
      <?php
      $x = 0;
      while ($x < $num) {
        if ($x == 0) {
          echo "<div class='carousel-item active'>";
          echo "<div class='image-wrap'>";
          echo "<img  src='src/";
          echo $data['filename'];
          echo $x;
          echo ".jpg' class='d-block w-100' alt='";
          echo $data['alt'];
          echo "'>";
          echo "</div>";
          echo "</div>";
          $x++;
        } else {
          echo "<div class='carousel-item'>";
          echo "<div class='image-wrap'>";
          echo "<img  src='src/";
          echo $data['filename'];
          echo $x;
          echo ".jpg' class='d-block w-100' alt='";
          echo $data['alt'];
          echo "'>";
          echo "</div>";
          echo "</div>";
          $x++;
        }
      }
      ?>
    </div>
    <?php
    echo "<button class='carousel-control-prev' type='button' data-bs-target='#";
    echo $data['class'];
    echo "p' data-bs-slide='prev'>";
    ?>
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <?php
    echo "<button class='carousel-control-next' type='button' data-bs-target='#";
    echo $data['class'];
    echo "p' data-bs-slide='next'>";
    ?>
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <div class="ka2">
    <div class="side">
      <div class="title">
        <h1>
          <?php
          echo $data['nome'];
          ?>
        </h1>
      </div>
      <h1 class="description">
        <?php
        echo $data['descricao'];
        ?>
      </h1>
      <h1 class="price">Preço: R$
        <?php
        echo intval($data['preco']);
        ?>,00
      </h1>
      <form class="comprar" action="comprar.php">
        <div style="text-align:left"><label for="quantity">Quantidade:</label>
          <input type="number" id="quantity" size="1" required name="quantity" min="1"><br />
          <label for="size">Tamanho:</label><select name="size" id="size">
            <option value="" selected>--</option>
            <option value="PP" <?php 
            if($data['pp']<=0){
              echo "disabled=\"disabled\"";
            }
            ?>>PP(<?php echo $data['pp']; ?>)</option>
            <option value="P" <?php 
            if($data['p']<=0){
              echo "disabled=\"disabled\"";
            }
            ?>>P(<?php echo $data['p']; ?>)</option>
            <option value="M" <?php 
            if($data['m']<=0){
              echo "disabled=\"disabled\"";
            }
            ?>>M(<?php echo $data['m']; ?>)</option>
            <option value="G" <?php 
            if($data['g']<=0){
              echo "disabled=\"disabled\"";
            }
            ?>>G(<?php echo $data['g']; ?>)</option>
            <option value="GG" <?php 
            if($data['gg']<=0){
              echo "disabled=\"disabled\"";
            }
            ?>>GG(<?php echo $data['gg']; ?>)</option>
          </select>
        </div><br />
        <input type="submit" name="Comprar" value="Comprar" id="btnComprar">
      </form>
    </div>
  </div>
  </div>
  <footer id="footer">
    <div class="fleft">
      <div class="f1">
        <h1>Ajuda</h1>
        <p>Política de Privacidade</p>
        <p>Pagamento</p>
        <p>Prazos</p>
      </div>
      <div class="f2">
        <h1>Sobre Nós</h1>
        <p>Society</p>
        <p>Fundadores</p>
        <p>Nossa História</p>
      </div>
    </div>
    <div class="fleft2">
      <div class="redes">
        <h1>Siga-nos nas redes</h1>
        <div class="icones">
          <a href="https://www.facebook.com/Societystore.co/"><i class="fa fa-facebook"></i></a>
          <a href="https://wa.me/5516999469400"><i class="fa fa-whatsapp"></i></a>
          <a href="https://www.instagram.com/_societystore_/"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="fright">
      <div class="messa">
        <h1>Mensagem</h1>
        <form action="mailto:societysac@gmail.com" method="post">
          <fieldset>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nome" required>
          </fieldset>
          <fieldset>
            <input name="email" type="text" class="form-control" id="email" placeholder="E-mail" required>
          </fieldset>
          <fieldset>
            <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefone" required>
          </fieldset>
          <fieldset>
            <textarea name="message" rows="6" class="form-control" id="message" required></textarea>
          </fieldset>
          <fieldset>
            <button type="submit" id="form-submit" class="btn">Enviar Mensagem</button>
          </fieldset>
        </form>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    document.getElementById('quantity').value = '1';
  </script>
</body>

</html>