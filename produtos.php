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
  <title>Society | Produtos</title>
  <meta name="description" content="Loja de Roupas">
  <meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
  <meta property="og:description" content="Produtos Socety Store">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Society Store">
  <meta property="og:title" content="Society | Produtos">
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
  <i id="top"></i>
  <nav id="nav">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo2b">
      <a href="index.php"><img rel="logo" src="src/logo.png"></a>
    </label>
    <ul class="btn2b">
      <li class="nactive"><a href="index.php">Home</a></li>
      <li id="user"><a href="login.php"><i class="far fa-user-circle"></i></a></li>
    </ul>
  </nav>
  <div class="prodt">
    <h1 class="tit">Produtos</h1>
    <div class="mark" id="mark">
    <?php
    $query = mysqli_query($conexao, "SELECT DISTINCT tipo FROM Produtos");
    $numer = (int)mysqli_num_rows($query);
    foreach ($query as $row) {
      $tipos[] = $row['tipo'];
    }
    for ($xab=0;$xab<$num;$x++){
      echo "<a href='#";
      echo $tipos[$x];
      echo "'>";
      echo $tipos[$x];
      echo "</a>";
    }
    ?>
    </div>
    <div class="p1C">
      <h1 id="camisa">Camisas </h1>
    </div>
    <?php
    $query = mysqli_query($conexao, "SELECT id FROM `Produtos` WHERE tipo='camisa'");
    $maxid = (int)mysqli_num_rows($query);
    if($maxid==0){
      echo "<h1>Em breve!!</h1>";
    }
    $maxidp = $maxid / 3;
    $modid = $maxid % 3;
    if ($modid > 0) {
      $maxidp -= $modid;
      $maxidp += 1;
    }
    $ab = 1;
    $camisasid = array();
    $req = mysqli_query($conexao, "SELECT id FROM Produtos WHERE tipo='camisa' ORDER BY id DESC");
    foreach ($req as $row) {
      $camisasid[] = $row['id'];
    };
    for ($x = 0; $x < $maxidp; $x++) {
      echo "<div class='camtot'>";
      $co =(1+($x*3));
      $akl =(3*($x+1));
      if ($akl>$maxid){
        $akl = $maxid;
      }
      for ($co;$co<=$akl;$co++) {
        $cop = $camisasid[($co-1)];
        echo "<div class='Cam'>";
        echo "<div class='Ca";
        echo $co;
        echo "'>";
        echo "<div id='Ca$co' class='carousel carousel-dark slide' data-bs-ride='carousel' data-bs-pause='false'>";
        echo "<div class='carousel-indicators'>";
        $query = mysqli_query($conexao, "SELECT * FROM `Produtos` WHERE id='$cop'");
        $data = mysqli_fetch_array($query);
        for ($ab = 0; $ab < $data['numfile']; $ab++) {
          if ($ab == 0) {
            echo "<button type='button' data-bs-target='#Ca$co' data-bs-slide-to='";
            echo $ab;
            echo "' class='active' aria-current='true' aria-label='Slide ";
            echo ($ab + 1);
            echo "'></button>";
          } else {
            echo "<button type='button' data-bs-target='#Ca$co' data-bs-slide-to='";
            echo $ab;
            echo "' aria-label='Slide ";
            echo ($ab + 1);
            echo "'></button>";
          }
        }
        echo "</div>";
        echo "<a href='prod.php?id=$cop'>";
        echo "<div class='carousel-inner'>";
        for ($ab = 0; $ab < $data['numfile']; $ab++) {
          if ($ab == 0) {
            echo "<div class='carousel-item active'>";
          } else {
            echo "<div class='carousel-item'>";
          }
          echo "<div class='image-wrap'>";
          echo "<img src='src/";
          echo $data['filename'];
          echo $ab;
          echo ".jpg' class='d-block w-100' alt='";
          echo $data['alt'];
          echo "'>";
          echo "</div>";
          echo "</div>";
        }
        echo "</div>";
        echo "</a>";
        echo "<button class='carousel-control-prev' type='button' data-bs-target='#Ca$co' data-bs-slide='prev'>";
        echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
        echo "<span class='visually-hidden'>Previous</span>";
        echo "</button>";
        echo "<button class='carousel-control-next' type='button' data-bs-target='#Ca$co' data-bs-slide='next'>";
        echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
        echo "<span class='visually-hidden'>Next</span>";
        echo "</button>";
        echo "</div>";
        echo "<a href='prod.php?id=$cop'>";
        echo "<div class='desc1$cop'>";
        echo "<p>";
        echo $data['dropname'];
        echo ": ";
        echo $data['nomeflat'];
        echo "</p>";
        echo "<p class='dpreco'>R$";
        echo $data['preco'];
        echo ",00</p>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
      }
      echo "</div>";
    }
    ?>

    <h1 id="moletom" style="margin-top: 15%;">Moletons </h1>
    <?php
    $query = mysqli_query($conexao, "SELECT id FROM `Produtos` WHERE tipo='moletom'");
    $maxid = (int)mysqli_num_rows($query);
    if($maxid==0){
      echo "<h1>Em breve!!</h1>";
    }
    $maxidp = $maxid / 3;
    $modid = $maxid % 3;
    if ($modid > 0) {
      $maxidp -= $modid;
      $maxidp += 1;
    }
    $ab = 1;
    $moletonsid = array();
    $req = mysqli_query($conexao, "SELECT id FROM Produtos WHERE tipo='moletom' ORDER BY id DESC");
    foreach ($req as $row) {
      $moletonsid[] = $row['id'];
    };
    for ($x = 0; $x < $maxidp; $x++) {
      echo "<div class='camtot'>";
      $co =(1+($x*3));
      $akl =(3*($x+1));
      if ($akl>$maxid){
        $akl = $maxid;
      }
      for ($co;$co<=$akl;$co++) {
        $cop = $moletonsid[($co-1)];
        echo "<div class='Cam'>";
        echo "<div class='Ca";
        echo $co;
        echo "'>";
        echo "<div id='Ca$co' class='carousel carousel-dark slide' data-bs-ride='carousel' data-bs-pause='false'>";
        echo "<div class='carousel-indicators'>";
        $query = mysqli_query($conexao, "SELECT * FROM `Produtos` WHERE id='$cop'");
        $data = mysqli_fetch_array($query);
        for ($ab = 0; $ab < $data['numfile']; $ab++) {
          if ($ab == 0) {
            echo "<button type='button' data-bs-target='#Ca$co' data-bs-slide-to='";
            echo $ab;
            echo "' class='active' aria-current='true' aria-label='Slide ";
            echo ($ab + 1);
            echo "'></button>";
          } else {
            echo "<button type='button' data-bs-target='#Ca$co' data-bs-slide-to='";
            echo $ab;
            echo "' aria-label='Slide ";
            echo ($ab + 1);
            echo "'></button>";
          }
        }
        echo "</div>";
        echo "<a href='prod.php?id=$cop'>";
        echo "<div class='carousel-inner'>";
        for ($ab = 0; $ab < $data['numfile']; $ab++) {
          if ($ab == 0) {
            echo "<div class='carousel-item active'>";
          } else {
            echo "<div class='carousel-item'>";
          }
          echo "<div class='image-wrap'>";
          echo "<img src='src/";
          echo $data['filename'];
          echo $ab;
          echo ".jpg' class='d-block w-100' alt='";
          echo $data['alt'];
          echo "'>";
          echo "</div>";
          echo "</div>";
        }
        echo "</div>";
        echo "</a>";
        echo "<button class='carousel-control-prev' type='button' data-bs-target='#Ca$co' data-bs-slide='prev'>";
        echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
        echo "<span class='visually-hidden'>Previous</span>";
        echo "</button>";
        echo "<button class='carousel-control-next' type='button' data-bs-target='#Ca$co' data-bs-slide='next'>";
        echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
        echo "<span class='visually-hidden'>Next</span>";
        echo "</button>";
        echo "</div>";
        echo "<a href='prod.php?id=$cop'>";
        echo "<div class='desc1$cop'>";
        echo "<p>";
        echo $data['dropname'];
        echo ": ";
        echo $data['nomeflat'];
        echo "</p>";
        echo "<p class='dpreco'>R$";
        echo $data['preco'];
        echo ",00</p>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
      }
      echo "</div>";
    }
    ?>
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