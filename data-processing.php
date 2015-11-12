<?php
/**
 * Created by PhpStorm.
 * User: jérémy
 * Date: 09/11/2015
 * Time: 18:28
 */
include 'util/util.inc.php'; //requete_db_mysql
//Déclaration des variables du formulaire à récupérer et à stocker
$identifiant = $_POST['Identifiant'];
$civilite = $_POST['Civilite'];
$mail = $_POST['E-mail'];
$mdp = $_POST['Mot_de_passe'];
$vmdp = $_POST['Verif_mot_de_passe'];
$tel = $_POST['Telephone'];
$pays = $_POST['pays'];
$cg = $_POST['Cond_gen'];
//Partie connexion à la BD
$today = date('Y-m-d');
requete_db_mysql_modification("INSERT INTO user (id, identifiant, Civilite, email, Motdepasse, Verificationmotdepasse, Telephone, Pays, Conditionsgenerales, dateIns) VALUES ('', '$identifiant', '$civilite', '$mail', '$mdp', '$vmdp', '$tel', '$pays',  '$cg', '$today')");

if('mailer == $action')
{
    $message = 'Voici vos identifiants d\'inscription :' . "\n";
    $message .= 'E-mail : ' . $mail . "\n";
    $message .= 'Mot de passe : ' . $mdp ."\n";
    $message .= 'Verification du mot de passe : ' . $vmdp ."\n";
    $message .= 'Numéro de téléphone : ' . $tel ."\n";
    $message .= 'Pays : ' . $pays ."\n";
    $message .= 'Conditions générales : ' . $cg ."\n";

    // Envoi du mail
    //mail('wasner83@gmail.com', 'Informations formulaire PHP', $message);
    //Apparition d'une pop up pour dire que le message à été bien envoyé
    $messagemail='Votre mail a été envoyé avec succès ! Redirection vers la page de contacte ';
    echo '<script type="text/javascript">window.alert("'.$messagemail.'"); window.location="/TD2.php";</script>';
}
else
{
    echo'<br/><strong>Bouton non géré !</strong><br/>';
}