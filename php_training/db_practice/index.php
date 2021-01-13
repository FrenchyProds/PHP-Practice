<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/stylesheet.css">
    </head>
    <body>
        <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            // $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
            // VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
            // $req->execute(array(
            //     'nom' => 'Apex Legends',
            //     'possesseur' => 'Paul',
            //     'console' => 'PC',
            //     'prix' => '0',
            //     'nbre_joueurs_max' => '60',
            //     'commentaires' => 'Un bon jeu crée par Respawn mais qui s\'est déterioré avec le rachat par EA Games'
            // ));

            // echo 'Le jeu a bien été ajouté !';

            // $bdd->exec('UPDATE jeux_video SET possesseur = "Respawn Entertainment" WHERE id = 51 ');

            // $res = $bdd->query('SELECT * FROM jeux_video WHERE id = 51') or die(print_r($bdd->errorInfo()));
            // $data = $res->fetch();

            // $res->closeCursor();
            
            // echo 'Le jeu ' . $data['nom'] . ' a été mis à jour !<br />Son possesseur est maintenant ' . $data['possesseur'] . ' !';
        
            $reponse = $bdd->query('SELECT ROUND(AVG(prix), 2) AS prix_moyen, possesseur FROM jeux_video GROUP BY possesseur');

            while($donnees = $reponse->fetch()) {
                echo '<p>' . $donnees['possesseur'] . ' : ' . $donnees['prix_moyen'] . '</p>' ; 
            }

            $reponse->closeCursor();
        
        ?>
    </body>
</html>




