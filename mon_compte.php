<?php try {
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="Interface.css">
        <title>Mon espace</title>
        <!--ajout des fonction en php + ajout de connection a le bdd-->
        <?php include 'fonction.php';
        connectionbdd(); ?>
    </head>

    <body>
        <?php //test que le user et bien connecter 
        if (isset($_SESSION['login'])) {
            menuco($BDD); ?>
            <div class="login-box">
                <h2>Compte</h2>
                <form action="" method="POST">
                    <div class="user-box">
                        <input type="password" name="Mdp">
                        <label>Nouveau Mot de passe</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="ConfiMdp">
                        <label>Confirmer Mot de passe</label>
                    </div>

                    <?php //trétement pour modifer le mots de passe
                    if (isset($_POST['MifMdp'])) {
                        if ($_POST['ConfiMdp'] == $_POST['Mdp']) {
                            $id_user = $_SESSION['id_user'];
                            $MDP = $_POST['ConfiMdp'];
                            $BDD->query("UPDATE `user` SET `password`= '$MDP' WHERE  id_user = '$id_user' ");
                        } else {
                            echo 'les 2 mots de passe ne sont pas identique';
                        }
                    }


                    ?>
                    <input class="lmyButton" type="submit" name="MifMdp" value="Modifier" />
                </form>
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
                </form>
            </div>

        <?php } else {
            menuco($BDD);
            echo 'connecter vous pour avoir accès au contenue de la page ';
        } ?>

    </body>

    </html>
<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>