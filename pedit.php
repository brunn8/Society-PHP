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
        <form method='post' action='editar.php' name='prodeditar'>
            <fieldset style="display: none;">
                <p>ID: <input name="id" type="hidden" placeholder="ID" required value='<?php echo $data['id'] ?>'></p>
            </fieldset>
            <fieldset>
                <p>Nome: <input name="nomeflat" type="text" placeholder="Nome" required value='<?php echo $data['nomeflat'] ?>'></p>
            </fieldset>
            <fieldset>
                <p>Nome em Titulos: <input name="nome" type="text" placeholder="Nome" required value='<?php echo $data['nome'] ?>'></p>
            </fieldset>
            <fieldset>
                <p>Descrição: <input name="descricao" type="text" placeholder="Descrição" required value="<?php echo $data['descricao'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>PP: <input name="pp" type="text" placeholder="PP" required value="<?php echo $data['pp'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>P: <input name="p" type="text" placeholder="P" required value="<?php echo $data['p'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>M: <input name="m" type="text" placeholder="M" required value="<?php echo $data['m'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>G: <input name="g" type="text" placeholder="G" required value="<?php echo $data['g'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>GG: <input name="gg" type="text" placeholder="GG" required value="<?php echo $data['gg'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>Preço: <input name="preco" type="text" placeholder="Preço" required value="<?php echo $data['preco'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>Drop: <input name="drop" type="text" placeholder="Drop X" required value="<?php echo $data['dropname'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>Nome Alt: <input name="alt" type="text" placeholder="Alt" required value="<?php echo $data['alt'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>Tipo: <input name="tipo" type="text" placeholder="Tipo" required value="<?php echo $data['tipo'] ?>"></p>
            </fieldset>
            <fieldset>
                <p>Número de fotos: <input name="numfile" type="text" placeholder="X" required value="<?php echo $data['numfile'] ?>"></p>
            </fieldset>
            <fieldset id="fnone">
                <input class="prodedit" type="submit" value="Editar valores" name="prodeditar"></input>
            </fieldset>
        </form>
    </div>
</body>

</html>