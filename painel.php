<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include "conectar.php";
    $char = mysqli_query($conexao, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    session_start();
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
        ?> Painel</title>
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
    <div class="paprod">
        <div class="pcamisas">
            <?php
            $req = mysqli_query($conexao, "SELECT * FROM Produtos WHERE tipo = 'camisa' ORDER BY id");
            ?>
            <?php
            if (isset($_SESSION['msg'])) {
                $erro = $_SESSION['msg'];
                echo "<p style='color: #f00; text-decoration:none; text-align:center;'> $erro</p>";
                unset($_SESSION['msg']);
            } ?>
            <h1>Camisas:</h1>
            <p class="pexplain">Estoque = soma de todos os tamanhos</p>
            <?php
            if (mysqli_num_rows($req) > 0) {
                echo "<div style=\"overflow-x: auto;\">";
                echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Imagens</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>PP</th>
                    <th>P</th>
                    <th>M</th>
                    <th>G</th>
                    <th>GG</th>
                    <th>Drop</th>
                    <th>Preço</th>
                    <th></th>
                    <th></th>
                </tr>";
            }
            ?>
            <?php
            while ($lk = mysqli_fetch_array($req)) {
                echo "<tr>";
                echo "<td>";
                echo $lk['id'];
                echo "</td>";
                echo "<td>";
                echo "<div id='paprodcarousel";
                echo $lk['id'];
                echo "' class='carousel slide' data-bs-ride='carousel' data-bs-pause='false'>";
                echo "<div class='carousel inner'>";
                $num = (int)$lk['numfile'];
                $x=0;
                while($x < $num) {
                    if ($x == 0) {
                        echo "<div class='carousel-item active'>";
                        echo "<div class='image-wrap'>";
                        echo "<img class='d-block w-100' src='src/";
                        echo $lk['filename'];
                        echo $x;
                        echo ".jpg' alt='";
                        echo $lk['alt'];
                        echo "'/>";
                        echo "</div>";
                        echo "</div>";
                        $x++;
                    } else {
                        echo "<div class='carousel-item'>";
                        echo "<div class='image-wrap'>";
                        echo "<img  src='src/";
                        echo $lk['filename'];
                        echo $x;
                        echo ".jpg' class='d-block w-100' alt='";
                        echo $lk['alt'];
                        echo "'/>";
                        echo "</div>";
                        echo "</div>";
                        $x++;
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "<td>";
                echo $lk['nomeflat'];
                echo "</td>";
                echo "<td>";
                echo $lk['pp']+$lk['p']+$lk['m']+$lk['g']+$lk['gg'];
                echo "</td>";
                echo "<td>";
                echo $lk['pp'];
                echo "</td>";
                echo "<td>";
                echo $lk['p'];
                echo "</td>";
                echo "<td>";
                echo $lk['m'];
                echo "</td>";
                echo "<td>";
                echo  $lk['g'];
                echo "</td>";
                echo "<td>";
                echo $lk['gg'];
                echo "</td>";
                echo "<td>";
                echo $lk['dropname'];
                echo "</td>";
                echo "<td>";
                echo $lk['preco'];
                echo "</td>";
                echo "<td>";
                echo "<a href='pexcluir.php?id=";
                echo $lk['id'];
                echo "'><button onclick=\"return confirm('você tem certeza que quer excluir o produto de id=";
                echo $lk['id'];
                echo "?');\">Excluir</button></a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='pedit.php?id=";
                echo $lk['id'];
                echo "'><button>Editar</button></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            <?php
            if (mysqli_num_rows($req) > 0) {
                echo "</table>";
                echo "</div>";
            }
            ?>
            <?php
            $req = mysqli_query($conexao, "SELECT * FROM Produtos WHERE tipo = 'moletom' ORDER BY id");
            ?>
        </div>
        <div class="pmoletons">
            <h1>Moletons:</h1>
            <?php
            if (mysqli_num_rows($req) > 0) {
                echo "<div style=\"overflow-x: auto;\">";
                echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Imagens</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>PP</th>
                    <th>P</th>
                    <th>M</th>
                    <th>G</th>
                    <th>GG</th>
                    <th>Drop</th>
                    <th>Preço</th>
                    <th></th>
                    <th></th>
                </tr>";
            }
            ?>
            <?php
            while ($lk = mysqli_fetch_array($req)) {
                echo "<tr>";
                echo "<td>";
                echo $lk['id'];
                echo "</td>";
                echo "<td>";
                echo "<div id='paprodcarousel";
                echo $lk['id'];
                echo "' class='carousel slide' data-bs-ride='carousel' data-bs-pause='false'>";
                echo "<div class='carousel inner'>";
                $num = (int)$lk['numfile'];
                $x=0;
                while($x < $num) {
                    if ($x == 0) {
                        echo "<div class='carousel-item active'>";
                        echo "<div class='image-wrap'>";
                        echo "<img class='d-block w-100' src='src/";
                        echo $lk['filename'];
                        echo $x;
                        echo ".jpg' alt='";
                        echo $lk['alt'];
                        echo "'/>";
                        echo "</div>";
                        echo "</div>";
                        $x++;
                    } else {
                        echo "<div class='carousel-item'>";
                        echo "<div class='image-wrap'>";
                        echo "<img  src='src/";
                        echo $lk['filename'];
                        echo $x;
                        echo ".jpg' class='d-block w-100' alt='";
                        echo $lk['alt'];
                        echo "'/>";
                        echo "</div>";
                        echo "</div>";
                        $x++;
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "<td>";
                echo $lk['nomeflat'];
                echo "</td>";
                echo "<td>";
                echo $lk['pp']+$lk['p']+$lk['m']+$lk['g']+$lk['gg'];
                echo "</td>";
                echo "<td>";
                echo $lk['pp'];
                echo "</td>";
                echo "<td>";
                echo $lk['p'];
                echo "</td>";
                echo "<td>";
                echo $lk['m'];
                echo "</td>";
                echo "<td>";
                echo  $lk['g'];
                echo "</td>";
                echo "<td>";
                echo $lk['gg'];
                echo "</td>";
                echo "<td>";
                echo $lk['dropname'];
                echo "</td>";
                echo "<td>";
                echo $lk['preco'];
                echo "</td>";
                echo "<td>";
                echo "<a href='pexcluir.php?id=";
                echo $lk['id'];
                echo "'><button onclick=\"return confirm('você tem certeza que quer excluir o produto de id=";
                echo $lk['id'];
                echo "?');\">Excluir</button></a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='pedit.php?id=";
                echo $lk['id'];
                echo "'><button>Editar</button></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            <?php
            if (mysqli_num_rows($req) > 0) {
                echo "</table>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="pbut">
            <form method='post' action='editar.php'>
                <fieldset>
                    <input name="pnovo" class='pnovo' type='submit' value='Novo produto' />
                </fieldset>
            </form>
        </div>
    </div>
</body>