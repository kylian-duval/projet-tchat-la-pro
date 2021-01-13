<?php try {
?>
    <?php
     /*if (!isset($_SESSION['id_user'])) {
        header('Location: connection.php');
    }*/

    if (isset($_POST['deco'])) {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0">';
    }
    $BDD = new PDO('mysql:host=192.168.65.227; dbname=projet tchat_la-pro;charset=utf8', 'kiki', 'kiki');
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Message</title>
        <!--ajout du css pour le style -->
        <link rel="stylesheet" href="message.css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <!--ajout des fonction en php + ajout de connection a le bdd-->
        <?php
        ?>
    </head>

    <body>
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
                                <td> <?php echo $tab['prenom'] ?> </td>
                            </tr>
                            <tr>
                                <td> <?php echo $tab['mail'] ?> </td>
                                <td>
                                    <p>&nbsp;</p>
                                </td>
                                <td><input type="checkbox" id="<?php echo $tab["id_contact"] ?>" name="id_contact[]" value="<?php echo $tab["id_contact"]; ?>"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo $tab['problème']; ?> </td>
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
                    foreach ($_POST["id_contact"] as $check) {
                        if (!isset($checkoptions)) {
                            $checkoptions = $check;
                        } else {
                            $checkoptions .= "," . $check;
                        }
                    }

                    $BDD->query("DELETE FROM `contact` WHERE id_Contact IN(" . $checkoptions . ")");
                    echo '<meta http-equiv="refresh" content="0">';
                }

                ?>
                <input type="submit" name="SuppMes" value="supprimer" />
            </form>

        </div>
    </body>

    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>