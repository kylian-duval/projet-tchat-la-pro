<?php try {
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Message</title>
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="message.css">
        <!--ajout des fonction en php + ajout de connection a le bdd-->
        <?php include 'fonction.php';
        $BDD = connectionbdd(); ?>
    </head>

    <body>
        <?php
        //test sur le user et connecter et si il y admin
        if (isset($_SESSION['login'])) {
            if ($_SESSION['ADMIN'] == 'true') {
                menuco($BDD); ?>
                <div align=center>
                    <?php

                    $request = $BDD->query("SELECT * FROM `contact` WHERE 1"); ?>
                    <form action="" method="post">
                        <?php
                        while ($tab = $request->fetch()) { ?>
                            <!--tableau qui affiche les message recu-->
                            <table class="styled-table" border="2">
                                <thead>
                                    <tr>
                                        <td><span> <?php echo $tab['nom'] ?> </span> </td>
                                        <td> <?php echo $tab['prénom'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $tab['mail'] ?> </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td><input type="checkbox" id="<?php echo $tab["id_Contact"] ?>" name="id_Contact[]" value="<?php echo $tab["id_Contact"]; ?>"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $tab['message']; ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        <?php } ?>



                        <?php
                        //trétement pour suprimer les message lu
                        if (isset($_POST['SuppMes'])) {

                            //NE PAS METTRE []
                            foreach ($_POST["id_Contact"] as $check) {
                                if (!isset($checkoptions)) {
                                    $checkoptions = $check;
                                } else {
                                    $checkoptions .= "," . $check;
                                }
                            }

                            $BDD->query("DELETE FROM `Contact` WHERE id_Contact IN(" . $checkoptions . ")");
                            echo '<meta http-equiv="refresh" content="0">';
                        }

                        ?>
                        <input type="submit" name="SuppMes" value="supprimer" />
                    </form>

                </div>

        <?php } else {
                menuco($BDD);
                echo "<div class = 'error' align = center>seul les administrateur de l'aplication web on accès au message</div>";
            }
        } else {
            menuco($BDD);
            echo "<div align=center class=error>connecter vous pour avoir accès au contenu de la page</div>";
        } ?>

    </body>

    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>