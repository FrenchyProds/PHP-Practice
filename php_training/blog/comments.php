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
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
            $req->execute(array($_GET['id']));
            $data = $req->fetch();
            if(!empty($data)) {
        ?>
                <section class="news">
                    <h3><?php echo htmlspecialchars($data['title']) ?> - <?php echo date("d/m H:i:s", strtotime($data['created_at'])) ?></h3>
                    <p><?php echo htmlspecialchars($data['content']) ?><br />
                </section>

                <h2>Comments</h2>
        <?php 
                $req->closeCursor();

                $req = $bdd->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY created_at ASC');
                $req->execute(array($_GET['id']));
                while($data = $req->fetch()) {
        ?>
                <section class="comments">
                    <p><strong><?php echo htmlspecialchars($data['author']); ?></strong> on <?php echo date("d/m H:i:s", strtotime($data['created_at'])) ?></p>
                    <p><?php echo htmlspecialchars($data['content']) ?></p>
                    <hr />
                </section>
        <?php
                }
                $req->closeCursor();
            } else {
                echo '<h1>Sorry, the page you are looking for does not exist</h1> <h3>Error 404<br />
                <a href="../blog">Return to the main page</a></h3>';
            }
        ?>
    </body>
</html>