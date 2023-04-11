<!DOCTYPE html>
<html>
<head>
    <title>Titre de la page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="inscrip">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
if($_POST){
    $_POST['prenom'] = addslashes($_POST['prenom']);
    $_POST['nom'] = addslashes($_POST['nom']);
    $_POST['mail'] = addslashes($_POST['mail']);
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $_POST['pseudo'] = addslashes($_POST['pseudo']);

    $pdo->exec("INSERT INTO users (pseudo, prenom, nom, mail, mdp, date_de_naissance) VALUES ('$_POST[pseudo]', '$_POST[prenom]', '$_POST[nom]', '$_POST[mail]', '$_POST[mdp]', '$_POST[birth]')");
    
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['pseudo'] = $_POST['pseudo'];

    $result = $pdo->query("SELECT id_users FROM users WHERE prenom = '$_POST[prenom]' AND nom = '$_POST[nom]' AND mail = '$_POST[mail]'");
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $user['id_users'];
?>
<div class="recap">
    <h2>Voici le récaptitulatif de vos informations :</h2>
    <ul>
        <li>Prenom : <?php echo $_POST['prenom']; ?></li>
        <li>Nom : <?php echo $_POST['nom']; ?></li>
        <li>Votre date de naissance est : <?php echo $_POST['birth']?></li>
        <li>Adresse e-mail : <?php echo $_POST['mail']; ?></li>
        <li>Mot de passe : <?php echo $_POST['mdp']; ?></li>
    </ul>
    <a href="index.php" target="blank" class="valid">Valider votre compte</a>
</div>
<?php
}else{

?>
<div class="formulaire">
    <h1 class="creation">Créer votre compte</h1>
    <form action="" method="post" class="formu">
        <input type="text" name="prenom" placeholder="Votre prénom" required>
        <br><br>
        <input type="text" name="nom" placeholder="Votre nom" required>
        <br><br>
        <input type="text" name="pseudo" placeholder="Votre pseudo" required>
        <h4 class="naissance">Date de naissance :</h4>
        <input type="date" name="birth" required>
        <br><br>
        <input type="email" name="mail" placeholder="Votre e-mail" required>
        <br><br>
        <input type="password" name="mdp" placeholder="Votre mot de passe" required>
        <br><br>
        <input type="submit" value="S'inscrire" class="submit" required>
    </form>
    <p class="page-connect">J'ai déjà un compte. <a href="connexion.php">Me connecter</a></p>
</div>
<?php
}
?>
</body>
</html>




