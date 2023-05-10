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
<!--    
<div class="form-connect">
    <h1 class="creation">Je me connecte</h1>
    <form action="" method="post" class="connect-form">
        <input type="text" name="prenom" placeholder="Votre prénom" required>
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="mail" placeholder="Votre e-mail" required>
        <input type="password" name="mdp" placeholder="Votre mot de passe" required>
        <input type="submit" value="Se connecter" class="submit">
    </form>
    <p class="page-connect">Je n'ai pas de compte. <a href="index.php">S'inscrire</a></p> -->

<div class="back-connect">
    <div class="p-3 rounded-4">
    <h1 class="text-white">Connectez vous !</h1>
    <form method="post">
    <div class="mb-3 mt-3 form-floating">
        <input type="text" name="prenom" id="floatingInput" class="form-control" required>
        <label class="form-label" for="floatingInput">Prénom :</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" name="nom" id="floatingInput" class="form-control"required>
        <label class="form-label" for="floatingInput">Nom :</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="email" class="form-control" id="floatingInput" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <label for="exampleInputEmail1" for="floatingInput" class="form-label">Adresse e-mail :</label>
    </div>
    <div class="mb-3 form-floating"">
        <input type="password" class="form-control" id="floatingInput" name="mdp" id="exampleInputPassword1" required>
        <label for="exampleInputPassword1" for="floatingInput" class="form-label">Password :</label>
    </div>
    <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
    <button type="submit" class="btn text-bg-light animate__bounce p-3 d-flex justify-content-center col-6 fs-5 mt-3 align-items-center">Se connecter</button>
    <div class="d-flex text-white justify-content-center mt-3">
        <p >Je n'ai pas de compte.</p>
        <a href="inscription.php" class="text-white d-flex justify-content-center ms-3">M'inscrire</a>
    </div>
    </div>
    </form>
</div>
</div>
    
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>