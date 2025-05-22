<?php
include('conectar.php');
$char = mysqli_query($conexao, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
session_start();
?>
<?php
if (isset($_POST['edit'])) {
    $id = $_SESSION['id'];
    if ($_POST['senhaa'] != $_SESSION['pass']) {
        $_SESSION['msg'] = "Senha antiga incorreta";
        header("Location:user.php");
    } else {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $pass = $_POST['senhan'];
        $change = mysqli_query($conexao, "UPDATE Clientes SET nome = '$nome', email = '$email', pass = '$pass' WHERE id = '$id'");
        if ($change===true) {
            $_SESSION['msg'] = "Sucesso ao editar informações";
        } else {
            $_SESSION['msg'] = "Falha ao editar informações";
        }
        header("Location:user.php");
        exit();
        mysqli_close($conexao);
    }
}
if (isset($_POST['novo'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $pp = $_POST['pp'];
    $p = $_POST['p'];
    $m = $_POST['m'];
    $g = $_POST['g'];
    $gg = $_POST['gg'];
    $numfile = $_POST['numfile'];
    $drop = $_POST['dropname'];
    $preco = $_POST['preco'];
    $alt = $_POST['alt'];
    $nomeflat = $_POST['nomeflat'];
    $tipo = $_POST['tipo'];
    $query = mysqli_query($conexao, "INSERT INTO `Produtos`(`nome`, `descricao`, `pp`, `p`, `m`, `g`, `gg`, `numfile`, `drop`, `preco`, `alt`, `nomeflat`, `tipo`) VALUES ('$nome', '$descricao', '$pp', '$p', '$m', '$g', '$gg', '$numfile', '$drop', '$preco', '$alt', '$nomeflat', '$tipo')");
    if ($query === TRUE) {
        $_SESSION['msg'] = "Sucesso ao editar informações";
    } else {
        $_SESSION['msg'] = "Falha ao editar informações";
    }
    header("Location:painel.php");
    exit();
    mysqli_close($conexao);
}
if (isset($_POST['prodeditar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $pp = $_POST['pp'];
    $p = $_POST['p'];
    $m = $_POST['m'];
    $g = $_POST['g'];
    $gg = $_POST['gg'];
    $numfile = $_POST['numfile'];
    $drop = $_POST['dropname'];
    $preco = $_POST['preco'];
    $alt = $_POST['alt'];
    $nomeflat = $_POST['nomeflat'];
    $tipo = $_POST['tipo'];
    $query = mysqli_query($conexao, "UPDATE Produtos SET nome='$nome', descricao='$descricao', pp='$pp', p='$p', m='$m', g='$g', gg='$gg', numfile='$numfile', `drop`='$drop', preco='$preco', alt='$alt', nomeflat='$nomeflat', tipo='$tipo' WHERE id='$id'");
    if ($query === TRUE) {
        $_SESSION['msg'] = "Sucesso ao editar informações";
    } else {
        $_SESSION['msg'] = "Falha ao editar informações";
    }
    header("Location:painel.php");
    exit();
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

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
    <title>Society |
        <?php
        $idnow = $_GET['id'];
        $records = mysqli_query($conexao, "SELECT * FROM Produtos WHERE id='$idnow'");
        $data = mysqli_fetch_array($records);
        ?> Edição</title>
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
        <?php
        if (isset($_SESSION['msg'])) {
            $erro = $_SESSION['msg'];
            echo "<p style='color: #f00; text-decoration:none;'> $erro</p>";
            unset($_SESSION['msg']);
        } ?>
        <form method='post' action='editar.php' name='novo' id='editar'>
            <fieldset>
                <p>Nome em uma linha: <input name="nomeflat" type="text" placeholder="Nome" required></p>
            </fieldset>
            <fieldset>
                <p>Nome em titulos: <input name="nome" type="text" placeholder="Nome" required></p>
            </fieldset>
            <fieldset>
                <p>Descrição: <input name="descricao" type="text" placeholder="Descrição" required></p>
            </fieldset>
            <fieldset>
                <p>PP: <input name="pp" type="text" placeholder="PP" required></p>
            </fieldset>
            <fieldset>
                <p>P: <input name="p" type="text" placeholder="P" required></p>
            </fieldset>
            <fieldset>
                <p>M: <input name="m" type="text" placeholder="M" required></p>
            </fieldset>
            <fieldset>
                <p>G: <input name="g" type="text" placeholder="G" required></p>
            </fieldset>
            <fieldset>
                <p>GG: <input name="gg" type="text" placeholder="GG" required></p>
            </fieldset>
            <fieldset>
                <p>Preço: <input name="preco" type="text" placeholder="Preço" required></p>
            </fieldset>
            <fieldset>
                <p>Drop: <input name="drop" type="text" placeholder="DropX" required></p>
            </fieldset>
            <fieldset>
                <p>Nome Alt: <input name="alt" type="text" placeholder="Alt" required></p>
            </fieldset>
            <fieldset>
                <p>Tipo: <input name="tipo" type="text" placeholder="Tipo" required></p>
            </fieldset>
            <fieldset>
                <p>Número de fotos: <input name="numfile" type="text" placeholder="X" required></p>
            </fieldset>
            <fieldset id="fnone">
                <input class="prodedit" type="submit" value="Criar" name="novo"></input>
            </fieldset>
        </form>
    </div>
</body>

</html>