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
        $request = $BDD->query("SELECT user.id_user, message.message, user.Pseudo, message.date, user.logo FROM message, user WHERE message.id_user = user.id_user ORDER BY `message`.`date` DESC");
        while ($tab = $request->fetch()) { ?>
            <li>
                <p class="date"><?php echo $tab['date'] ?></p>
                <a href="profil.php?id=<?= $tab['id_user'] ?>">
                    <h3><img src="<?php echo $tab['logo'] ?>" alt="erreur chargement image" class="logo" /><?php echo $tab['Pseudo'] ?> </h3>
                </a>
                <p><?php echo $tab['message'] ?></p>
            </li>
        <?php  } ?>
</ul>