<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  include "conectar.php";
  $char = mysqli_query($conexao, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  $query = mysqli_query($conexao, "SELECT max(id) FROM `Produtos`");
  $data = mysqli_fetch_array($query);
  $maxid = (int)$data['max(id)'];
  $query = mysqli_query($conexao, "SELECT min(id) FROM `Produtos`");
  $data = mysqli_fetch_array($query);
  $minid = (int)$data['min(id)'];
  $query = mysqli_query($conexao, "SELECT max(numfile) FROM `Produtos`");
  $data = mysqli_fetch_array($query);
  $maxph = (int)$data['max(numfile)'];
  $query = mysqli_query($conexao, "SELECT min(numfile) FROM `Produtos`");
  $data = mysqli_fetch_array($query);
  $minph = (int)$data['min(numfile)'];
  $numph = random_int($minph, $maxph);
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
  <title>Society | Home</title>
  <meta name="description" content="Loja de Roupas">
  <meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
  <meta property="og:description" content="Produtos Socety Store">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Society Store">
  <meta property="og:title" content="Society | Home">
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
  <i name="top"></i>
  <nav id="nav">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo2b">
      <a href="index.php"><img rel="logo" src="src/logo.png"></a>
    </label>
    <ul class="btn2b">
      <li class="nactive"><a href="produtos.php">Produtos</a></li>
      <li id="user"><a href="login.php"><i class="far fa-user-circle"></i></a></li>
    </ul>
  </nav>
  <container class="cont2b">
    <div id="indca" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-pause="false">
      <div class="carousel-inner">
        <?php
        $x = 0;
        while ($x < $numph) {
          $numpra = (int)random_int($minid, $maxid);
          $result = mysqli_query($conexao, "SELECT * FROM `Produtos` WHERE id='$numpra'");
          $data = mysqli_fetch_array($result);
          $numb = (int)random_int(0, ($data['numfile'] - 1));
          if ($data['numfile'] < $x) {
          } else {
            if ($x == 0) {
              echo "<div class='carousel-item active'>";
              echo "<div class='image-wrap'>";
              echo "<img src='src/";
              echo $data['filename'];
              echo ($numb);
              echo ".jpg' class='d-block w-100' alt='";
              echo $data['alt'];
              echo "'>";
              echo "</div>";
              echo "</div>";
              $x++;
            } else {
              echo "<div class='carousel-item'>";
              echo "<div class='image-wrap'>";
              echo "<img src='src/";
              echo $data['filename'];
              echo $numb;
              echo ".jpg' class='d-block w-100' alt='";
              echo $data['alt'];
              echo "'>";
              echo "</div>";
              echo "</div>";
              $x++;
            }
          }
        }
        ?>
      </div>
    </div>
  </container>
  <div class="krou">
    <h1>Novo</h1>
    <div class="prod">
      <div class='ka1'>
        <div id="indexca" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-pause="false">
          <div class="carousel-indicators">
            <?php
            $x = 0;
            $result = mysqli_query($conexao, "SELECT * FROM `Produtos` WHERE id ='$maxid'");
            $data = mysqli_fetch_array($result);
            $xc = (int)$data['numfile'];
            while ($x < $xc) {
              if ($x == 0) {
                echo "<button type='button' data-bs-target='#indexca' data-bs-slide-to='";
                echo $x;
                echo "' class='active' aria-current='true' aria-label='Slide ";
                echo ($x + 1);
                echo "'></button>";
              } else {
                echo "<button type='button' data-bs-target='#indexca' data-bs-slide-to='";
                echo $x;
                echo "' aria-label='Slide ";
                echo ($x + 1);
                echo "'></button>";
              }
              $x++;
            }
            ?>
          </div>
          <?php
          echo "<a href='prod.php?id=";
          echo $data['id'];
          echo "'>";
          ?>
            <div class="carousel-inner">
              <?php
              for ($x = 0; $x < $data['numfile']; $x++) {
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
                }
              }
              ?>
            </div>
          </a>
          <button class="carousel-control-prev" type="button" data-bs-target="#indexca" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#indexca" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
          <?php
          echo "<a href='prod.php?id=";
          echo $data['id'];
          echo "'>";
          ?>
          <div class="desc1">
            <p><?php echo $data['dropname'];
                echo ": ";
                echo $data['nomeflat'] ?></p>
          </div>
        </a>
      </div>
      <div class="ka2">
        <div class="desctext">
          <h1 class="hdesc" style="color:#000; margin-top:5%;">Descrição</h1>
          <p class="pdesc">
            <?php
            echo $data['nome'];
            ?>
            <br />
            <?php
            echo $data['descricao'];
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="middle2b">
    <div class="wd100">
      <div class="left2b"></div>
      <div class="right2b"></div>
    </div>
    <p>Sobre a Loja</p>
    <div class="text2b">
      <p>
        --Em Construção--
      </p>
      <p></p>
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
</body>

</html>