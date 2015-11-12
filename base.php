<?php
/**
 * Created by PhpStorm.
 * User: jérémy
 * Date: 09/11/2015
 * Time: 20:39
 */
include 'util/util.inc.php'; //requete_db_mysql
include_once 'Excluded/Connect_db.php'; //Permet de chercher les informations de connection à la BD
//Partie de connexion à la base de donnée
echo "Connexion à la base de donnée en cours ..";
echo '<br/>';
$dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass) or die('Erreur de connexion au serveur :' .mysqli_connect_error());
echo "Connexion à la base de données réussie";
echo '<br/><br/>';
//Partie de selection de la base de donnée souhaité
$dbBd = "phpiutaix2_db";
echo "Selection de la base de donnée en cours ...";
echo '<br/>';
mysqli_select_db($dbLink, $dbBd) or die ('Erreur dans la sélection de la Base de donnée : ' . mysqli_error($dbLink));
echo "Selection de la base de donnée réussie";
echo '<br/><br/>';
//Partie exécution des requêtes SQL
echo "Execution de la requête en cours ..";
echo '<br/>';
$query = 'SELECT id, email, dateIns FROM user';
echo 'Execution de la requête avec succès, voici les résultats : ';
echo '<br/><br/>';
if(!($dbResult = mysqli_query($dbLink, $query)))
{
    echo 'Erreur de requête<br/>';
    //Affiche le type d'érreur
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
    //Affiche la requête qui à générer l'erreur
    echo 'La requête qui à renvoyé une erreur est la requête : ' . $query . '<br/>';
    exit();
}
else
    while ($dbRow = mysqli_fetch_assoc($dbResult))
    {
        echo 'Le numéros d\'identitiant de l\'utilisateur est le : ';
        echo $dbRow['id'] . '<br/>';
        echo "L'e-mail de l'utilisateur est : ";
        echo $dbRow['email'] . '<br/>';
        echo 'L\'utilisateur s\'est enregistré le : ';
        echo date('d.m.y', strtotime($dbRow['date'])) . '<br/>';
        echo '<br/><br/>';
    }

//Test fonction
echo "Test de la fonction connect_db qui devrais avoir les mêmes résultats que précédemment :";
echo '<br/>';
$requete = 'SELECT id, email, dateIns FROM user';
//Partie de traitement de la requête au sens phrase de la requête  !!!
$argument = str_word_count($requete, 1, 'àáãç'); //Enlève les ',' et ne garde que les mots de la requête
$argument = implode(" ", $argument); // Transforme le Array en une string facilement exploitable
preg_match('#SELECT(.+)FROM#isU', $argument, $matches); //Ne garde que les noms des colonnes que l'utilisateur veut afficher (présent dans la requête)
$ToussNomCol = $matches[1]; //Variables contenant tous les noms des colonnes de la requête
$ToussNomCol = trim($ToussNomCol, ' '); //Permet d'enelver l'espace blanc au début
$NomCol = explode(' ', $ToussNomCol); // Convertie la chaine de caractère en Array pour pouvoir afficher facilement le numéros de colonnes
$NumCol = 0; //Déclaration variable permettant d'afficher le nombre à entrer pour afficher tel ou tel valeur de la BD
foreach ($NomCol as $value)
{
    echo $NumCol . ' = ' . $value . "  ";
    $NumCol+=1;
}
echo '<br/><br/><br/>';
//Partie du traitement de la requête SQL (sur la DB)
$test = requete_db_mysql_visualisation($requete);
echo $test;
echo '<br/>';
echo 'La requpête est terminé ici ..';
?>