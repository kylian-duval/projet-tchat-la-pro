<?php 

function inscription($Mom, $Prenom, $identifiant, $password, $BDD)
{


    $roquette = ("INSERT INTO `user`(`Nom`, `Prénom`, `Pseudo`, `Mdp`, `ADMIN`) VALUES ('$Mom','$Prenom','$identifiant','$password','false') ");
    $BDD->query("$roquette");
    header('Location: index.php');
}?>






