<?php 

function inscription($Mom, $Prenom, $identifiant, $password, $BDD)
{


    $roquette = ("INSERT INTO `user`(`Nom`, `Prénom`, `Pseudo`, `Mdp`,`logo`, `ADMIN`) VALUES ('$Mom','$Prenom','$identifiant','$password','logo/base.jpg','false') ");
    $BDD->query("$roquette");
    header('Location: index.php');
}

function contact($nom, $prénom, $mail, $message, $BDD)
{
    $roquette = ("INSERT INTO `contact`(`nom`, `prenom`, `mail`,`problème`) VALUES ('$nom','$prénom','$mail','$message') ");
    $BDD->query("$roquette");
}

function ConectionBDD(){
    $BDD = new PDO('mysql:host=mysql-kylian-duval.alwaysdata.net; dbname=kylian-duval_tchat;charset=utf8', '223354_admin', 'admin123456789.');
    return $BDD;
}




?>






