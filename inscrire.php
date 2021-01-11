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
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <!--ajout des fonction php + appel fonction pour se connecter a la bdd -->
        <?php require 'fonction.php' ?>
    </head>
    <?php $BDD = new PDO('mysql:host=192.168.65.227; dbname=projet tchat_la-pro;charset=utf8', 'kiki', 'kiki'); ?>

    <body>
        <div class="login-box">
            <h2>Inscription</h2>
            <form action="" method="POST">
                <div class="user-box">
                    <input type="text" name="NOM" required>
                    <label>Nom</label>
                </div>
                <div class="user-box">
                    <input type="text" name="PRENOM" required>
                    <label>Prénom</label>
                </div>
                <div class="user-box">
                    <input type="text" name="LOGIN" required>
                    <label>Identifiant</label>
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
                    Se connecter
                </a>
            </form>
            <?php
            // vérifi sur le mots de passe et le confi mots de passe son les même
            if (isset($_POST['inscrir'])) {
                if (isset($_POST['MDP']) && isset($_POST['CONFMDP'])) {

                    if ($_POST['MDP'] != $_POST['CONFMDP']) {
                        echo "<div class='error'>les deux mots de passe ne correspondent pas</div>";
                    } else {
                        $requeteMail = $BDD->prepare("SELECT * FROM user WHERE Pseudo = ?");
                        $requeteMail->execute(array($_POST['LOGIN']));
                        $userExist = $requeteMail->rowCount();
                        if ($userExist != 1) {
                            echo "<div class = 'error'>merci de votre inscription</div>";
                            inscription($_POST['NOM'],$_POST['PRENOM'],$_POST['LOGIN'], $_POST['CONFMDP'], $BDD); 
                        } else {
                            echo "<div class = 'error'>cette Identifiant est utiliser par quelqu'un veuiller choisi un autre </div>";
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