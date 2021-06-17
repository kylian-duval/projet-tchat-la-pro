<?php try {
      session_start();
      if (!isset($_SESSION['id_user'] )) {
        header('Location: index.php');
      }
      if($_SESSION['ADMIN'] =='false'){
        header('Location: index.php');
    }
?>

    <!DOCTYPE html>
    <?php
    // inclure le ficher avec tout les fonction
    require ('fonction.php');
    $BDD = ConectionBDD(); ?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <!--inclure le ficher css pour le style de la page -->
        <link rel="stylesheet" href="admin.css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace Admin</title>
    </head>

    <body>
    
        <!--on teste sur le user et connecter et si il est admin -->
        <?php
        $request = $BDD->query("SELECT * FROM `user` WHERE 1"); ?>
        <div class="login-box">
            <h2>Interface Admin </h2>
            <form action="" method="post">
                <!-- tableau qui affiche les user et leur info-->
                <table class="styled-table" border="2">
                    <thead>
                        <tr>
                            <td>id_user</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Pseudo</td>
                            <td>Mdp</td>
                            <td>Admin</td>
                        </tr>
                    </thead>
                    <?php
                    while ($tab = $request->fetch()) { ?>
                        <tbody>
                            <tr>
                                <td><span> <?php echo $tab['id_user'] ?> </span> </td>
                                <td> <?php echo $tab['Nom'] ?> </td>
                                <td> <?php echo $tab['Prénom'] ?> </td>
                                <td> <?php echo $tab['Pseudo'] ?> </td>
                                <td> <?php echo $tab['Mdp'] ?> </td>
                                <td> <?php echo $tab['ADMIN'] ?> </td>
                                <td><input type="checkbox" id="<?php echo $tab["id_user"] ?>" name="id_user[]" value="<?php echo $tab["id_user"] ?>"></td>
                            </tr>
                        </tbody>
                    <?php
                    } ?>
                </table>


                <input type="submit" name="op" value="admin" />
                <input type="submit" name="deop" value="retirer les droits" />
                <input type="submit" name="suppuser" value="supprimer" />
                <input type="submit" name="modif_user" value="modifier" />

            </form>
            <?php
            $request = $BDD->query("SELECT * FROM `message` WHERE 1 ORDER BY `date`  DESC"); ?>
            <form action="" method="post">
                <!-- tableau qui affiche les film -->
                <table class="styled-table" border="2">
                    <thead>
                        <tr>
                            <td>id_message</td>
                            <td>id_user</td>
                            <td>message</td>
                            <td>date</td>
                        </tr>
                    </thead>
                    <?php
                    while ($tab = $request->fetch()) { ?>
                        <tbody>
                            <tr>
                                <td><span> <?php echo $tab['id_message'] ?> </span> </td>
                                <td> <?php echo $tab['id_user'] ?> </td>
                                <td> <?php echo $tab['message'] ?> </td>
                                <td> <?php echo $tab['date'] ?> </td>
                                <td><input type="checkbox" id="<?php echo $tab["id_message"] ?>" name="id_message[]" value="<?php echo $tab["id_message"] ?>"></td>
                            </tr>
                        </tbody>
                    <?php
                    } ?>
                </table>

                <input type="submit" name="suppfilm" value="supprimer" />



            </form>
            <?php



            //TTRAITEMENT SUPPRESSION USER
            if (isset($_POST['suppuser'])) {

                //NE PAS METTRE []
                foreach ($_POST["id_user"] as $check) {
                    if (!isset($checkoptions)) {
                        $checkoptions = $check;
                    } else {
                        $checkoptions .= "," . $check;
                    }
                }

                $BDD->query("DELETE FROM `user` WHERE id_user IN(" . $checkoptions . ")");
                echo '<meta http-equiv="refresh" content="0">';
            }
            ////TTRAITEMENT POUR METTRE ADMIN UN USER
            if (isset($_POST['op'])) {


                foreach ($_POST["id_user"] as $check) {
                    if (!isset($checkoptions)) {
                        $checkoptions = $check;
                    } else {
                        $checkoptions .= "," . $check;
                    }
                }

                $BDD->query("UPDATE `user` SET `ADMIN`='true' WHERE id_user IN(" . $checkoptions . ")");
                echo '<meta http-equiv="refresh" content="0">';
            }
            //TTRAITEMENT POUR SUPRIMER LES DROIT A UN USER
            if (isset($_POST['deop'])) {


                foreach ($_POST["id_user"] as $check) {
                    if (!isset($checkoptions)) {
                        $checkoptions = $check;
                    } else {
                        $checkoptions .= "," . $check;
                    }
                }

                $BDD->query("UPDATE `user` SET `ADMIN`='false' WHERE id_user IN(" . $checkoptions . ")");
                echo '<meta http-equiv="refresh" content="0">';
            }
            //TTRAITEMENT SUPPRESSION FILM
            if (isset($_POST['suppfilm'])) {


                foreach ($_POST["id_message"] as $check) {
                    if (!isset($checkoptions)) {
                        $checkoptions = $check;
                    } else {
                        $checkoptions .= "," . $check;
                    }
                }

                $BDD->query("DELETE FROM `message` WHERE id_message IN(" . $checkoptions . ")");
                echo '<meta http-equiv="refresh" content="0">';
            }
            ?>

        <!--trétement pour modifer un user -->
        <?php if (isset($_POST['modif_user'])) {

            $request = $BDD->query("SELECT `id_user`,`Pseudo` FROM `user`"); ?>
            <form action="" method="post">
                <select name="iduser" id="SelectMedecin">
                    <?php
                    while ($data = $request->fetch()) {
                        echo '<option value="' . $data["id_user"] . '">' . $data['Pseudo'] . '</option>';
                    } ?>
                </select>
                <p><input type="submit" name="updateUser" value="modifier" /></p>

            </form>
        <?php } ?>
        <?php if (isset($_POST['updateUser'])) {
            $iduser = $_POST['iduser'];

            $request = $BDD->query("SELECT * FROM `user` where `id_user` =  $iduser "); ?>
            <form action="" method="post">
                <?php while ($tab = $request->fetch()) { ?>
                    <input type="text" name="mofifiduser" readonly value="<?php echo $tab['id_user'] ?>">
                    <span>login:</span> <input type="text" name="modiflogin" value='<?php echo $tab['Pseudo'] ?> '>
                    <span>mots de passe</span><input type="text" name="modifmdp" value='<?php echo $tab['Mdp'] ?> '>

                <?php } ?>
                <input type="submit" name="finalmodifuser" value="modifier" />
            </form>

        <?php } ?>
        <?php
        if (isset($_POST['finalmodifuser'])) {


            $modiflogin = $_POST['modiflogin'];
            $modifmdp = $_POST['modifmdp'];
            $mofifiduser = $_POST['mofifiduser'];
            $BDD->query("UPDATE `user` SET `Pseudo`= '$modiflogin' ,  `Mdp` = '$modifmdp'  WHERE `id_user` =  $mofifiduser ");
            echo '<meta http-equiv="refresh" content="0">';
        } ?>






    </body>

    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>