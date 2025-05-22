<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php
	include "conectar.php";
	session_start();
	if (!isset($_SESSION['email'])) {
		header('Location:login.php');
		exit;
	}
	$seid = $_SESSION['id'];
	$request = mysqli_query($conexao, "SELECT * FROM `Clientes` WHERE id='$seid'");
	$data = mysqli_fetch_array($request);
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
	<title>Society | Sessão</title>
	<meta name="description" content="Loja de Roupas">
	<meta name="keywords" content="Roupa, Vestuário, Streetwear, Estilo, Society, Society Store, Store, Loja">
	<meta property="og:description" content="Produtos Socety Store">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Society Store">
	<meta property="og:title" content="Society | Sessão">
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
			<div class="nactive">
				<li class="sidespace"><a href="index.php">Home</a></li>
				<li class="sidespace"><a href="produtos.php">Produtos</a></li>
			</div>
			<li id="user"><a href="login.php"><i class="far fa-user-circle"></i></a></li>
		</ul>
	</nav>
	<div class="userinfo">
		<form method='post' action='editar.php' name='editar' id='editar'>
			<?php
			if (isset($_SESSION['msg'])) {
				$erro = $_SESSION['msg'];
				echo "<p style='color: #f00; text-decoration:none;'> $erro</p>";
				unset($_SESSION['msg']);
			} ?>
			<fieldset>
				<p>E-mail: <input class="userinfoinput" name="email" type="text" placeholder="E-mail" required value="<?php echo $data['email'] ?>"></p>
			</fieldset>
			<fieldset>
				<p>Nome: <input class="userinfoinput" name="nome" type="text" placeholder="Nome" required value="<?php echo $data['nome'] ?>"></p>
			</fieldset>
			<fieldset>
				<p>Senha Atual: <input class="userinfoinput" name="senhaa" type="text" placeholder="Senha Atual" required></p>
			</fieldset>
			<fieldset>
				<p>Senha Nova: <input class="userinfoinput" name="senhan" type="text" placeholder="Senha Nova" required></p>
			</fieldset>
			<fieldset id="fnone">
				<input class="sair" type="submit" value="Editar valores" name="edit"></input>
			</fieldset>
		</form>
		<form method='post' action='sair.php' name='sair' id='sair'>
			<fieldset>
				<input class='sair' type='submit' value='Deslogar' />
			</fieldset>
		</form>
	</div>
</body>

</html>