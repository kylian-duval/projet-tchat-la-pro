<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div id="page" class="container">
        <div id="header">
            <div id="logo">
                <img src="<?php echo $_SESSION['logo'] ?>" alt="" />
                <h1 style="color: white;"><?php echo $_SESSION['Pseudo'] ?></h1>

            </div>
</body>

</html>