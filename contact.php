<?php try {
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <!--ajout du css pour le style-->
        <link rel="stylesheet" href="contact.css">
        <!--ajout des fonction php + appel pour se connecter a la bdd-->
        <?php include "fonction.php";
        connectionbdd(); ?>
    </head>

    <body>
    <!--affiche le menu de navigation-->
        <?php menuco($BDD); ?>
        <div class="login-box">
            <h2>Nous Conctater</h2>
            <form action="" method="post">
                <div class="user-box">
                    <input type="text" id="Nom" name="Nom" required>
                    <label>Nom</label>
                </div>
                <div class="user-box">
                    <input type="text" id="Prénom" name="Prénom" required>
                    <label>Prénom</label>
                </div>
                <div class="user-box">
                    <input type="email" id="formulaire.txt" name="mail" required>
                    <label>Adresse mail</label>
                </div>
                <p>Votre Message:</p>
                <div><textarea id="msg" name="user_message" type="text" style="height:80px;" id="formulaire.txt" name="formulaire.txt" required minlength="0" maxlength="1000" size="1000"></textarea></div>
                <div class="centrer"><input class="button" type="submit" name="envoyer" value="envoyer" /></div>
            </form>
        </div>
    </body>
    <?php
    //trétement pour envoyer un message dans la BDD
    if (isset($_POST['envoyer'])) {

        contact($_POST['Nom'], $_POST['Prénom'], $_POST['mail'], $_POST['user_message'], $BDD);
    }


    ?>

    </html>
<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>