<!DOCTYPE html>
<html>
    <head>
        <title>Calculatrice</title>
    </head>
    <body>
        <form method="GET">
            <label for="label1"> Valeur 1</label><input id = "label1" type ="text" name = "nombre1"><br/>
            <label for="label2"> Opération (*,+,-,/)</label><input id = "label2" type ="text" name = "operation"><br/>
            <label for="label3"> Valeur 2</label><input id = "label2" type ="text" name = "nombre2"><br/>
            <input type="submit" value ="Calculer"><br/><br/><br/>
        </form>
        <?php
        //Déclaration des variables de récéption du formulaire
        $nombre1 = $_GET["nombre1"];
        $signe = $_GET["operation"];
        $nombre2 = $_GET["nombre2"];
        $nombre3 = $_GET["nombre1"];

        //Déclaration des fonctions de calcule
        $addition = ($nombre1 + $nombre2);
        $soustraction = ($nombre1 - $nombre2);
        $multiplication = ($nombre1 * $nombre2);
        $division = ($nombre1 / $nombre2);

        //Condition d'execution de calcule
        if("+" == $signe)
        {
            echo "Le résultat est : $addition";
        }

        elseif("-" == $signe)
        {
            echo "Le résultat est : $soustraction";
        }

        elseif("*" == $signe)
        {
            echo "Le résultat est : $multiplication";
        }

        elseif("/" == $signe)
        {
            echo "Le résultat est : $division";
        }
        ?>
    </body>
</html>
