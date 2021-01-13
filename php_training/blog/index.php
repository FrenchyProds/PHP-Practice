<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Marvel Blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/stylesheet.css">
    </head>
    <body>
        <h1>The Amazing Marvel Blog !</h1>
        <h2>Here are our latest blog posts :</h2>
        <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->query('SELECT id, title, content, created_at FROM posts ORDER BY created_at ASC LIMIT 0, 5');
            while($data = $req->fetch()) {
        ?>
                <section class="news">
                    <h3><?php echo htmlspecialchars($data['title']) ?> - <?php echo date("d/m H:i:s", strtotime($data['created_at'])) ?></h3>
                    <p><?php echo htmlspecialchars($data['content']) ?><br />
                    <a href="comments.php?id=<?php echo $data['id']; ?>">Go to the comments !</a></p>   
                </section>
        <?php
            }
            $req->closeCursor();
        ?>
    </body>
</html>