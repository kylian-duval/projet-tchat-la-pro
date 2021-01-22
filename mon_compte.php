<?php try {
?>
    <?php session_start();
    if (!isset($_SESSION['id_user'])) {
        header('Location: connection.php');
    }

    $BDD = new PDO('mysql:host=192.168.65.227; dbname=projet tchat_la-pro;charset=utf8', 'kiki', 'kiki');
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="Interface.css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <title>Mon espace</title>
        <!--ajout des fonction en php + ajout de connection a le bdd-->
        <?php include 'fonction.php';
        ?>
    </head>

    <body>



        <div class="login-box">
            <h2>Compte</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="user-box">
                    <input type="password" name="Mdp">
                    <label>Nouveau Mot de passe</label>
                </div>
                <div class="user-box">
                    <input type="password" name="ConfiMdp">
                    <label>Confirmer Mot de passe</label>
                </div>
                <div class="user-box">
                    <input type="file" name="afficheUplode">
                    <label>entrer votre nouveau logo</label>
                </div>


                <?php //trétement pour modifer le mots de passe
                if (isset($_POST['MifMdp'])) {
                    if ($_POST['ConfiMdp'] == $_POST['Mdp']) {
                        $id_user = $_SESSION['id_user'];
                        $MDP = $_POST['ConfiMdp'];
                        $BDD->query("UPDATE `user` SET `Mdp`= '$MDP' WHERE  id_user = '$id_user' ");
                    } else {
                        echo 'les 2 mots de passe ne sont pas identique';
                    }
                }


                ?>
                <input type="submit" name="EnvoiFilmUplode" value="modif logo" class='lmyButton' />
                <input class="lmyButton" type="submit" name="MifMdp" value="Modifier" />
            </form>
            <?php
            if (isset($_POST['EnvoiFilmUplode'])) {

                $maxSize = 900000;
                $valideType = array('.jpg', '.jpeg', '.gif', '.png');

                if ($_FILES['afficheUplode']['error'] > 0) {
                    echo "une erreur est survenue lors du transfert";
                    die;
                }
                $fileSize = $_FILES['afficheUplode']['size'];

                if ($fileSize > $maxSize) {
                    echo "les fichier est trop volumineux";
                    die;
                }

                $fileType = "." . strtolower(substr(strrchr($_FILES['afficheUplode']['name'], '.'), 1));

                if (!in_array($fileType, $valideType)) {
                    echo "le fichier sélectionné n'est pas une image";
                    die;
                }
                $tmpName = $_FILES['afficheUplode']['tmp_name'];
                $Name = $_FILES['afficheUplode']['name'];
                $fileName = "logo/" . $Name;
                $résultUplod = move_uploaded_file($tmpName, $fileName);
                if ($résultUplod) {
                    echo "transfere terminer";
                }
                $id_user =  $_SESSION['id_user'];
                $BDD->query("UPDATE `user` SET `logo`= '$fileName' WHERE `id_user` = '$id_user' ");
                $_SESSION['logo'] = $fileName;
                } ?>
            <form action="" method="POST">
                <?php

                //trétement pour suprimer son compte
                if (isset($_POST['SuppUser'])) {

                    $id_user = $_SESSION['id_user'];
                    $BDD->query("DELETE FROM `user` WHERE id_user = '$id_user' ");
                    session_destroy();
                    echo '<meta http-equiv="refresh" content="0">';
                }

                ?>
                <input class="lmyButton" type="submit" name="SuppUser" value="Supprimer mon compte" />
                <a href="index.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                   Acceuil
                </a>
            </form>
            



        </div>


    </body>

    </html>
<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>