<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    //var_dump($pdo);
    session_start();
    if(isset($_GET['supprimer'])){
        $supp_tweet_id = $_GET['supprimer'];
        $pdo->exec("DELETE FROM tweet WHERE id_tweet = $supp_tweet_id");
        header("Location: profil.php");
    } 
    ?>
</body>
</html>