<?php try {
    session_start();
    if (isset($_SESSION['id_user'])) {
        header('Location: index.php');
    }
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="connection.css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <!--ajout des fonction php + appel fonction pour se connecter a la bdd -->
        <?php 
        require ('fonction.php');
        $BDD = ConectionBDD();  
        ?>
    </head>

    <body>
        <div class="login-box">
            <h2>Connexion</h2>
            <form action="" method="POST">
                <div class="user-box">
                    <input type="text" name="login" required>
                    <label>Pseudo</label>
                </div>
                <div class="user-box">
                    <input type="password" name="mdp" required>
                    <label>Mot de passe</label>
                </div>

                <a href="inscrire.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    s'incrire
                </a>

                <button name="valide">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    connexion
                </button>


            </form>
            <?php
        if (isset($_POST['valide'])) {
            if (!empty($_POST['login']) and !empty($_POST['mdp'])) {
                $requser = $BDD->prepare("SELECT * FROM user WHERE Pseudo = ? AND Mdp = ?");
                $requser->execute(array($_POST['login'], $_POST['mdp']));
                $userexist = $requser->rowCount();
                if ($userexist == 1) {
                    $userexist = $requser->fetch();
                    $_SESSION['id_user'] = $userexist['id_user'];
                    $_SESSION['Pseudo'] = $userexist['Pseudo'];
                    $_SESSION['ADMIN'] = $userexist['ADMIN'];
                    $_SESSION['logo'] = $userexist['logo'];
                    //header('Location: index.php');
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "<div style='color:red'>Mauvais mail ou mot de passe !</div>";
                }
            } else {
                echo "<div style='color:red'>Tous les champs doivent être complétés !</div>";
            }
        }
        ?>
        </div>
       


    </body>


    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>