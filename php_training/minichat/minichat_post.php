<?php  

setcookie('username', $_POST['username'], time() + 365*24*3600, null, null, false, true);

if(isset($_POST['username']) && (isset($_POST['msg'])))  {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $req = $bdd->prepare('INSERT INTO livechat(username, msg, post_date) VALUES(:username, :msg, NOW())');
    $req->execute(array(
        'username' => htmlspecialchars($_POST['username']),
        'msg' => htmlspecialchars($_POST['msg']),
    ));
    header('Location: /php_training/minichat/');
} else {
    $message = "Oops ! Something went wrong, our devs are looking into it...";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>



