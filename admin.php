<?php try {
?>

    <!DOCTYPE html>
    <?php
    // inclure le ficher avec tout les fonction
    include 'fonction.php';
    connectionbdd(); ?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <!--inclure le ficher css pour le style de la page -->
        <link rel="stylesheet" href="admin.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace Admin</title>
    </head>

    <body>
        <!--on teste sur le user et connecter et si il est admin -->
        <?php if (isset($_SESSION['login'])) {
            if ($_SESSION['ADMIN'] == 'true') {
                menuco($BDD);


                $request = $BDD->query("SELECT * FROM `user` WHERE 1"); ?>
                <div class="login-box">
                    <h2>Interface Admin </h2>
                    <form action="" method="post">
                        <!-- tableau qui affiche les user et leur info-->
                        <table class="styled-table" border="2">
                            <thead>
                                <tr>
                                    <td>id_user</td>
                                    <td>Login</td>
                                    <td>Password</td>
                                    <td>Admin</td>
                                    <td>Voter</td>
                                </tr>
                            </thead>
                            <?php
                            while ($tab = $request->fetch()) { ?>
                                <tbody>
                                    <tr>
                                        <td><span> <?php echo $tab['id_user'] ?> </span> </td>
                                        <td> <?php echo $tab['identifiant'] ?> </td>
                                        <td> <?php echo $tab['password'] ?> </td>
                                        <td> <?php echo $tab['ADMIN'] ?> </td>
                                        <td> <?php echo $tab['vote'] ?> </td>
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
                    $request = $BDD->query("SELECT * FROM `film` WHERE 1"); ?>
                    <form action="" method="post">
                        <!-- tableau qui affiche les film -->
                        <table class="styled-table" border="2">
                            <thead>
                                <tr>
                                    <td>id_film</td>
                                    <td>nom</td>
                                    <td>imgSource</td>
                                    <td>auteur</td>
                                    <td>nombre de vote</td>
                                </tr>
                            </thead>
                            <?php
                            while ($tab = $request->fetch()) { ?>
                                <tbody>
                                    <tr>
                                        <td><span> <?php echo $tab['id_film'] ?> </span> </td>
                                        <td> <?php echo $tab['nom'] ?> </td>
                                        <td> <?php echo $tab['imgSource'] ?> </td>
                                        <td> <?php echo $tab['auteur'] ?> </td>
                                        <td> <?php echo $tab['nb_vote'] ?> </td>
                                        <td><input type="checkbox" id="<?php echo $tab["id_user"] ?>" name="id_film[]" value="<?php echo $tab["id_film"] ?>"></td>
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


                        foreach ($_POST["id_film"] as $check) {
                            if (!isset($checkoptions)) {
                                $checkoptions = $check;
                            } else {
                                $checkoptions .= "," . $check;
                            }
                        }

                        $BDD->query("DELETE FROM `film` WHERE id_film IN(" . $checkoptions . ")");
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                    ?>
                    <h1>Par quelle methode vous aller vous ajouter un film ?</h1>
                    <form action="" method="POST">
                        <p><span> via lien internet:</span> <input type="submit" name="lien" value="lien" /> <span>ou </span><span>via uploade de fichier: </span><input type="submit" name="uplode" value="uplode" /></p>
                    </form>
                    <form action="" method="POST">
                        <?php if (isset($_POST['lien'])) { ?>

                            <input type="text" name="nom" placeholder="entre le nom du film" required>
                            <input type="text" name="affiche" placeholder="entre lien de l'affiche du film" required>
                            <input type="text" name="auteur" placeholder="entre l'auteur du film" required>
                            <input type="submit" name="EnvoiFilmLien" value="ajoute" />
                        <?php } ?>
                    </form>
                    <!--ajoute des film en utilisent des lien internet pour l'affiche du film -->
                    <?php if (isset($_POST['EnvoiFilmLien'])) {
                        $nom = $_POST['nom'];
                        $affiche = $_POST['affiche'];
                        $auteur = $_POST['auteur'];
                        $BDD->query("INSERT INTO `film`(`nom`, `imgSource`, `auteur`, `nb_vote`) VALUES ('$nom','$affiche','$auteur','0')");
                        echo '<meta http-equiv="refresh" content="0">';
                    } ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php if (isset($_POST['uplode'])) { ?>

                            <input type="text" name="nomUplod" placeholder="entre le nom du film" required>
                            <input type="file" name="afficheUplode" required>
                            <input type="text" name="auteurUplod" placeholder="entre l'auteur du film" required>
                            <input type="submit" name="EnvoiFilmUplode" value="ajoute" />
                        <?php } ?>
                    </form>
                    <!--ajoute des film en utilisent l'uplaod pour l'affiche du film -->
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
                        $fileName = "film/" . $Name;
                        $résultUplod = move_uploaded_file($tmpName, $fileName);
                        if ($résultUplod) {
                            echo "transfere terminer";
                        }
                        $nomUplod = $_POST['nomUplod'];
                        $auteurUplod = $_POST['auteurUplod'];
                        $BDD->query("INSERT INTO `film`(`nom`, `imgSource`, `auteur`, `nb_vote`) VALUES ('$nomUplod','$fileName','$auteurUplod','0')");
                        echo '<meta http-equiv="refresh" content="0">';
                    } ?>


                    <form action="" method="post">
                        <h4> réinitialiser tout les votes c'est ici !!!</h4>
                        <input type="submit" name="réinitialiser" value="réinitialiser" />
                    </form>
                </div>
                <!--résinaliser les vote-->
                <?php if (isset($_POST['réinitialiser'])) {

                    $BDD->query("UPDATE `user` SET `vote`='non'");
                    $BDD->query("UPDATE `film` SET `nb_vote`='0'");
                    echo '<meta http-equiv="refresh" content="0">';
                } ?>

                <!--trétement pour modifer un user -->
                <?php if (isset($_POST['modif_user'])) {

                    $request = $BDD->query("SELECT `id_user`,`identifiant` FROM `user`"); ?>
                    <form action="" method="post">
                        <select name="iduser" id="SelectMedecin">
                            <?php
                            while ($data = $request->fetch()) {
                                echo '<option value="' . $data["id_user"] . '">' . $data['identifiant'] . '</option>';
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
                            <span>login:</span> <input type="text" name="modiflogin" value='<?php echo $tab['identifiant'] ?> '>
                            <span>mots de passe</span><input type="text" name="modifmdp" value='<?php echo $tab['password'] ?> '>
                            <span>si il y a deja voté</span><input type="text" name="modifvote" value='<?php echo $tab['vote'] ?> '>

                        <?php } ?>
                        <input type="submit" name="finalmodifuser" value="modifier" />
                    </form>

                <?php } ?>
                <?php
                if (isset($_POST['finalmodifuser'])) {


                    $modiflogin = $_POST['modiflogin'];
                    $modifmdp = $_POST['modifmdp'];
                    $modifvote = $_POST['modifvote'];
                    $mofifiduser = $_POST['mofifiduser'];
                    $BDD->query("UPDATE `user` SET `identifiant`= '$modiflogin' ,  `password` = '$modifmdp' , `vote`= '$modifvote' WHERE `id_user` =  $mofifiduser ");
                    echo '<meta http-equiv="refresh" content="0">';
                } ?>


        <?php } else {
                menuco($BDD);
                echo '<div align=center class = error>vous etes pas administrateur de cette apllication web vous avais pas accès au contenu de la page</div>';
            }
        } else {
            menuco($BDD);
            echo '<div align=center class = error >connecter vous pour avoir accès au contenue de la page </div>';
        } ?>



    </body>

    </html>

<?php } catch (Exception $e) {

    echo "J'ai eu un problème erreur :" . $e->getMessage();
}  ?>