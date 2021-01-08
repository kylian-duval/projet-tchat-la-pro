<?php try {
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="inscrire.css">
        <!--ajout des fonction php + appel fonction pour se connecter a la bdd -->
        <?php include "fonction.php";
        $BDD = connectionbdd(); ?>
    </head>
    <?php if (isset($_SESSION['login'])) { ?>

        <body>
            <?php menuco($BDD); ?>
            <h2 class='error' align=center>vous êtes déja inscrit</h2>

        <?php } else { ?>
            <div class="login-box">
                <h2>Inscription</h2>
                <form action="" method="POST">
                    <div class="user-box">
                        <input type="text" name="LOGIN" required>
                        <label>Nom</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="MDP" required>
                        <label>Mot de passe</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="CONFMDP" required>
                        <label>Confirmer mot de passe</label>
                    </div>
                    <input class="button" type="submit" name="inscrir" value="S'inscrire">
                    <a href="index.php">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Accueil
                    </a>
                </form>
            <?php
            // vérifi sur le mots de passe et le confi mots de passe son les même
            if (isset($_POST['inscrir'])) {
                if (isset($_POST['MDP']) && isset($_POST['CONFMDP'])) {

                    if ($_POST['MDP'] != $_POST['CONFMDP']) {
                        echo "<div class='error'>les deux mots de passe ne correspondent pas</div>";
                    } else {
                        verifUser($BDD);
                    }
                }
            }
        }
            ?>
            </div>
        </body>


    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>