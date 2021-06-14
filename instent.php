<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <?php
    require 'fonction.php';
    $BDD = ConectionBDD();
    ?>

</head>



<ul class="style1">
    <div>
        <?php
        $request = $BDD->query("SELECT message.message, user.Pseudo, message.date FROM message, user WHERE message.id_user = user.id_user ORDER BY `message`.`date` DESC");
        while ($tab = $request->fetch()) { ?>
            <li>
                <p class="date"><?php echo $tab['date'] ?></p>
                <h3><?php echo $tab['Pseudo'] ?> </h3>
                <p><?php echo $tab['message'] ?></p>
            </li>
        <?php  } ?>
</ul>