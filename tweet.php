<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


if($_POST){
    $destination = NULL;
    
    if(isset($_FILES['image_tweet'])){
        $image_name = $_FILES['image_tweet']['name'];
        $tmp_name = $_FILES['image_tweet']['tmp_name'];
        
        if ($_FILES['image_tweet']['size'] <= 2097152) {
            $dossier = './stockfile/';
            $destination = $dossier . $image_name;
            move_uploaded_file($tmp_name, $destination);
        } else {
            echo 'La taille de votre image doit être inférieure à 2 MO';
        }
    }
    
    $_POST['message'] = addslashes($_POST['message']);
    
    $stmt = $pdo->prepare("INSERT INTO tweet (message, date_heure_message, type, image_chemin, id_users) VALUES (:message, NOW(), :type, :image_chemin, :id_users)");
    $stmt->bindParam(':message', $_POST['message']);
    $stmt->bindParam(':type', $_POST['type']);
    $stmt->bindParam(':image_chemin', $destination);
    $stmt->bindParam(':id_users', $_SESSION['user_id']);
    
    if($stmt->execute()) {
        echo "Tweet posté avec succès !";
    } else {
        echo "Échec de la publication du tweet.";
    }
    var_dump($_POST['message']);
}
?>


