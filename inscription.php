<!DOCTYPE html>
<html>
<head>
    <title>Titre de la page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
<!--<div class="formulaire">
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
</div>-->


<div class="inscrip-back">
    <div class="p-3 rounded-4">
        <h1 class="text-white">Créer votre compte</h1>
        <form method="post">
        <div class="mb-3 form-floating">
            <input type="text" name="prenom" id="floatingInput" class="form-control" required>
            <label class="form-label" for="floatingInput">Prénom :</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="text" name="nom" id="floatingInput" class="form-control"required>
            <label class="form-label" for="floatingInput">Nom :</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="text" name="pseudo" id="floatingInput" class="form-control" required>
            <label class="form-label" for="floatingInput">Pseudo :</label>
        </div>
        <div class="mb-3 d-flex jutify-content-center flex-column align-items-center">
            <h3 class="text-white">Votre date de naissance :</h3>
            <input name="birth" type="date" class="col-6" required>
        </div>
        <div class="mb-3 form-floating">
            <input type="email" class="form-control"  name="mail" id="floatingInput" aria-describedby="emailHelp" required>
            <label for="exampleInputEmail1" for="floatingInput" class="form-label">Adresse e-mail :</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="password" class="form-control" name="mdp" id="floatingInput" required>
            <label for="exampleInputPassword1" for="floatingInput" class="form-label">Password :</label>
        </div>
        <div class="mb-3 d-flex justify-content-center flex-column align-items-center" style="--bs-btn-padding-y: .105rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        <button type="submit" class="btn text-bg-light p-3 d-flex col-6 fs-5 justify-content-center ">S'inscrire</button>
        <div class="d-flex text-white mt-3">
            <p>J'ai déjà un compte.</p>
            <a href="connexion.php" class="text-white ms-3">Se connecter</a>
        </div>
        </div>
        </form>
    </div>
</div>

<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>