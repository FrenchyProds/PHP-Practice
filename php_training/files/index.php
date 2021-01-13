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
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            // On ouvre le fichier
            $monfichier = fopen('count.txt', 'r+');

            $times_seen = fgets($monfichier); // On récupère le fichier .txt
            $times_seen += 1; // On incrémente le nombre de vue de 1 à chaque fois

            fseek($monfichier, 0); // On se replace au début du fichier
            fputs($monfichier, $times_seen); // On écrit la valeur de $times_seen dans le fichier

            echo '<p>Cette page a été vue <strong>' . $times_seen . '</strong> fois !</p>'; // On imprime cette valeur en HTML

            // Quand on a fini de l'utiliser, on ferme le fichier
            fclose($monfichier);
        ?>
            
    </body>
</html>

