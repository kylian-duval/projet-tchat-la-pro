<?php session_start();
if(!isset($_SESSION['id_user'])){
	header('Location: connection.php');
}

if (isset($_POST['deco'])) {
	session_destroy();
	echo '<meta http-equiv="refresh" content="0">';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Skeleton 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

	<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<body>
	<div id="page" class="container">
		<div id="header">
			<div id="logo">
				<img src="images/pic02.jpg" alt="" />
				<h1><a href="#">Privy</a></h1>
				<span>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></span>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
					<li><a href="index.php" accesskey="2" title="">tchat</a></li>
					<li><a href="#" accesskey="3" title="">s'inscrire</a></li>
					<li><a href="mon_compte.php" accesskey="4" title="">mon compte</a></li>
					<li><a href="contact.php" accesskey="5" title="">Contact</a></li>
					<form action="" method="post">
						<button type='sumbmit' name="deco">
							<li><a accesskey="5" title="">Déconnection</a></li>
						</button>
						<input class="button" type="submit" name="deco" value="Déconnection">
					</form>
				</ul>
			</div>
		</div>
		<div id="main">
			<div id="banner">
				<img src="images/pic01.jpg" alt="" class="image-full" />
			</div>
			<div id="welcome">
				<div class="title">
					<h2>Fusce ultrices fringilla metus</h2>
					<span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span>
				</div>
				<p>This is <strong>Privy</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
				<ul class="actions">
					<li><a href="#" class="button">Etiam posuere</a></li>
				</ul>
			</div>
			<div id="featured">
				<div class="title">
					<h2>Maecenas lectus sapien</h2>
					<span class="byline">Integer sit amet aliquet pretium</span>
				</div>
				<ul class="style1">
					<li class="first">
						<p class="date"><a href="#">Jan<b>05</b></a></p>
						<h3>Amet sed volutpat mauris</h3>
						<p><a href="#">Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Etiam non felis. Donec ut ante.</a></p>
					</li>
					<li>
						<p class="date"><a href="#">Jan<b>03</b></a></p>
						<h3>Sagittis diam dolor amet</h3>
						<p><a href="#">Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie. Donec leo, vivamus fermentum nibh in augue praesent congue rutrum.</a></p>
					</li>
					<li>
						<p class="date"><a href="#">Jan<b>01</b></a></p>
						<h3>Amet sed volutpat mauris</h3>
						<p><a href="#">Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Etiam non felis. Donec ut ante.</a></p>
					</li>
					<li>
						<p class="date"><a href="#">Dec<b>31</b></a></p>
						<h3>Sagittis diam dolor amet</h3>
						<p><a href="#">Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie. Donec leo, vivamus fermentum nibh in augue praesent congue rutrum.</a></p>
					</li>
				</ul>
			</div>
			<div id="copyright">
				<span>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a></span>
				<span>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</span>
			</div>
		</div>
	</div>
</body>


</html>