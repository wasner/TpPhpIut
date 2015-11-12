<?php
/**
 * Created by PhpStorm.
 * User: jérémy
 * Date: 09/11/2015
 * Time: 17:56
 */
include 'util/util.inc.php';

//Correspond à l'adresse IP de celui qui visualise la page.
echo "Nous savons qui vous êtes, la preuve voici votre adresse IP :";
echo getenv("REMOTE_ADDR");
echo '<br/>';
echo "L'adresse IP du serveur est : ";
echo getenv('HTTP_HOST');
echo '<br/>';
//phpinfo();
//Création du formulaire :

echo '<form action="data-processing.php" method="post">
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
            <label for="cond_gen" >Conditions générales : </label><input type="checkbox" name="Cond_gen" id="cond_gen" value="1"/><br/>
            <input type ="submit" name="action" value="Mailer" /><input type ="submit" name="action" value="Rec" /><br/>
         </form>';
?>