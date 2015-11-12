<?php
/**
 * Created by PhpStorm.
 * User: w14007405
 * Date: 09/11/2015
 * Time: 18:14
 */

function start_page ($title)
{
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"><head><title>' . "\n"
      . $title . '</title></head><body>' . "\n";
};
function end_page ()
{
  echo '</body></html>';
};

function requete_db_mysql_visualisation ($query)
{
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=mysql-phpiutaix2.alwaysdata.net;dbname=phpiutaix2_db;charset=utf8', '114889', 'jeremy');
        //Execution de la requête
        $reponse = $bdd->query($query);
        $numColonnes = 2; // voir ordre de selection dans la requête SQL
        $resultat2= $reponse->fetchColumn($numColonnes); // Valeur du résultat pour une colonne donnée
        $nomCol = $reponse->getColumnMeta($numColonnes); // Nom de la colonnes
        $nomVarCol = print $nomCol['name']; //ne garde que le nom de la colonnes parmis toutes les informations présente dans le array
        return $nomVarCol .' = ' . $resultat2 . '<br/>'; // Affiche le nom de la colonne ainsi que la valeur
        //return $reponse;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }

}

function requete_db_mysql_modification ($query)
{
    include_once '../Excluded/Connect_db.php';
    //Partie de connexion à la base de donnée
    if (!isset($dbHost) || isset($dbLogin) || isset($dbPass))
    {
        echo 'N\'oubliez pas de créer le fichier Connect_db.php dans le dossier Excluded !';
    }
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
    else {
        echo 'La requête : ' . $query . ' a été envoyer avec succès !';
        echo 'Elle a modifié : ' , mysqli_affected_rows($dbLink) , ' lignes';
        echo '<br/><br/>';
    }

}
function generate_form ($action_page)
{
  echo '<form action="' . $action_page . '" method="post">
            <label>Identifiant : </label><input type="text" name="Identifiant" /><br/>
            <label>Civilité : </label><input type="radio" name="Civilite" value="homme" id="homme" /><label for="homme">Homme </label>
                                      <input type="radio" name="Civilite" value="femme" id="femme" /><label for="femme">Femme</label><br/>
            <label>E-mail : </label><input type="test" name="E-mail" /><br/>
            <label>Mot de passe : </label><input type="password" name="Mot_de_passe"/><br/>
            <label>Verification du mot de passe : </label><input type="password" name="Verif_mot_de_passe" /><br/>
            <label>Telephone : </label><input type="text" name="Telephone"/><br/>
            <label for="pays">Pays : </label><select name="pays" id="pays">
                                                <option value="france">France</option>
                                                <option value="suisse">Suisse</option>
                                                <option value="canada">Canada</option>
                                             </select><br/>
            <label for="cond_gen" >Conditions générales : </label><input type="checkbox" name="Cond_gen" id="cond_gen" /><br/>
            <input type ="submit" name="action" value="Mailer" /><input type ="submit" name="action" value="Rec" /><br/>
         </form>';
}
?>