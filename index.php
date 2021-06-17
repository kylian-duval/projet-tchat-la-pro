<?php session_start();
if (!isset($_SESSION['id_user'])) {
	header('Location: connection.php');
}

if (isset($_POST['deco'])) {
	session_destroy();
	echo '<meta http-equiv="refresh" content="0">';
}
require('fonction.php');
$BDD = ConectionBDD();
?>

<!DOCTYPE>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>TCHAT</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<body>
	<div id="page" class="container">
		<div id="header">
			<div id="logo">
				<img src="<?php echo $_SESSION['logo'] ?>" alt="erreur chargement image" />
				<h1 style="color: white;"><?php echo $_SESSION['Pseudo'] ?></h1>

			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.phptre" accesskey="1" title="">tchat</a></li>
					<li><a href="mon_compte.php" accesskey="4" title="">mon compte</a></li>
					<li><a href="contact.php" accesskey="5" title="">Contact</a></li>
					<?php if ($_SESSION['ADMIN'] == 'true') { ?>
						<li><a href="index.php" accesskey="2" title="">image</a></li>
						<li><a href="admin.php" accesskey="4" title="">admin</a></li>
						<li><a href="message.php" accesskey="5" title="">boite de réseption</a></li>
					<?php } ?>
					<form action="" method="post">
						<input class="button" type="submit" name="deco" value="Déconnection">
					</form>
				</ul>
			</div>
		</div>
		<div id="main">


			<div class="title">
				<h2>Le tchat des SN</h2>
				<span class="byline">dite un mots</span>
			</div>
			<div id="copyright">
				<form action="" method="POST">
					<div><textarea id="msg" name="message" type="text" style="height:80px;" id="formulaire.txt" name="formulaire.txt" required minlength="0"></textarea></div>
					<div class="centrer"><input class="button" type="submit" name="envoyer" value="envoyer" /></div>
				</form>
				<?php
				if (isset($_POST['envoyer'])) {
					$dates = date('Y-m-d H:i:s');
					$id_user = $_SESSION['id_user'];
					$mes = htmlspecialchars($_POST['message']);
					//$roquette = ("INSERT INTO `message` (`id_user`, `message`, `date`) VALUES ('$id_user',\"" . $_POST['message'] . "\", '$dates') ");
					$roquette = ("INSERT INTO `message` (`id_user`, `message`, `date`) VALUES ('$id_user','$mes', '$dates') ");
					$BDD->query("$roquette");
					//echo '<meta http-equiv="refresh" content="0">';
				}


				//SELECT message.message, user.Pseudo, message.date FROM message, user WHERE message.id_user = user.id_user  
				//ORDER BY `message`.`date` DESC
				?>

			</div>
			<div id="featured">
				<ul class="style1">

					<?php $request = $BDD->query("SELECT user.id_user, message.message, user.Pseudo, message.date, user.logo FROM message, user WHERE message.id_user = user.id_user ORDER BY `message`.`date` DESC");
					while ($tab = $request->fetch()) { ?>
						<li>
							<p class="date"><?php echo $tab['date'] ?></p>
							<a href="pr"></a>
							<a href="profil.php?id=<?=$tab['id_user'] ?>"><h3><img src="<?php echo $tab['logo'] ?>" alt="erreur chargement image" class="logo" /><?php echo $tab['Pseudo'] ?> </h3></a>
							<p><?php echo $tab['message'] ?></p>
						</li>
					<?php  } ?>

				</ul>
				<script>
					setInterval('load_messages()', 500);

					function load_messages() {
						$('#featured').load('instent.php');


					}
				</script>
			</div>

		</div>

	</div>
</body>


</html>