<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mini Live Chat !</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/stylesheet.css">
    </head>
    <body>

        <h2>Welcome to Minichat, the uncensored, unmoderated instant chatting app</h2>

        <p>To start chatting, type in your username and message in the forms below !</p>

        <form action="minichat_post.php" method="post">
            <div class="inputMod">
                <label for="username">Username</label>
                <input name="username" placeholder="username here !" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username']; } ?>" type="text" />
            </div>
            <div class="inputMod">
                <label for="msg">Message</label>
                <textarea name="msg" placeholder="Leave your message here"></textarea>
            </div>
            <input type="submit" value="Send message !"/>
        </form>
                                                                                
        <a href="/php_training/minichat/"><p class="reloadPage">Reload the page !</p></a>                                                                            

        <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
            $res = $bdd->query('SELECT username, msg, post_date AS post_date FROM livechat ORDER BY id DESC LIMIT 0, 10');
            while($data = $res->fetch())
            {
        ?>

        <section class="chatDisplay">
            <?php
                echo '<p>' . date("m/d H:i:s", strtotime($data['post_date'])) . ' by<strong> ' . htmlspecialchars($data['username']) . '</strong>' . ' : ' . htmlspecialchars($data['msg']) . '</p>';
                }
                $res->closeCursor();
            ?> 
        </section>
        
    </body>
</html>