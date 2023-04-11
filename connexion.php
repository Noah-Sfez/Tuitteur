<!DOCTYPE html>
<html>
<head>
    <title>Titre de la page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="connection">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
if($_POST){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $password=$_POST['mdp'];

    $query = "SELECT * FROM users WHERE prenom = :prenom AND nom = :nom AND mail = :mail";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'prenom' => $prenom,
        'nom' => $nom,
        'mail'=> $mail
    ]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    if ($user && password_verify($password, $user['mdp'])) {
        
        $_SESSION['prenom']=$user['prenom'];
        $_SESSION['nom']=$user['nom'];
        $_SESSION['pseudo']=$user['pseudo'];
        $_SESSION['id'] = $user['id_users'];
        $_SESSION['date_naissance'] = $user['date_de_naissance'];
    
        $pseudo = $user['pseudo'];
        $user_id = $user['id_users'];

        $_SESSION['pseudo']= $pseudo;
        $_SESSION['user_id']= $user_id;
        var_dump($_SESSION);
        header('Location: index.php');
        exit;
    } else {
        
        $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
}

?>
    
<div class="form-connect">
    <h1 class="creation">Je me connecte</h1>
    <form action="" method="post" class="connect-form">
        <input type="text" name="prenom" placeholder="Votre prénom" required>
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="mail" placeholder="Votre e-mail" required>
        <input type="password" name="mdp" placeholder="Votre mot de passe" required>
        <input type="submit" value="Se connecter" class="submit">
    </form>
    <p class="page-connect">Je n'ai pas de compte. <a href="index.php">S'inscrire</a></p>
    
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>

</body>
</html> 