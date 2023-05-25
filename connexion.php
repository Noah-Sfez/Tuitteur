<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./images/lotus-symbol.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="connectio">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
$shakeButtonClass = ''; // L'ut
$error = '';
if($_POST){
    $mail=$_POST['mail'];
    $password=$_POST['mdp'];

    $query = "SELECT * FROM users WHERE mail = :mail";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
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
        $shakeButtonClass = 'text-white shake-button'; // Ajoute la classe shake-but
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

<!--<h1 class="title_background">Lotus</h1>
<div class="back-connect">
    <div class="p-3 rounded-4">
        <h2 class="text-white">Connectez vous !</h2>
        <form method="post">
            <div class="mb-3 form-floating">
                <input type="email" class="form-control" id="floatingInput" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <label for="exampleInputEmail1" for="floatingInput" class="form-label">Adresse e-mail :</label>
            </div>
            <div class="mb-3 form-floating"">
                <input type="password" class="form-control" id="floatingInput" name="mdp" id="exampleInputPassword1" required>
                <label for="exampleInputPassword1" for="floatingInput" class="form-label">Password :</label>
            </div>
            <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
            <button type="submit" class="btn text-bg-light animate__bounce p-3 d-flex <?php //echo $shakeButtonClass; ?> justify-content-center col-6 fs-5 mt-3 align-items-center" id="login-button">Se connecter</button>
                    <div class="d-flex text-white justify-content-center mt-3">
                        <p >Je n'ai pas de compte.</p>
                        <a href="inscription.php" class="text-white d-flex justify-content-center ms-3">M'inscrire</a>
                    </div>
            </div>
        </form>
    </div>
</div> 
-->

<div class="form_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
            <form action="" method="post" class="form_horizontal">
                <div class="form_icon"><i class="fa fa-user"></i></div>
                <h3 class="title">Connexion</h3>
                <p><?php echo $error;?></p>
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-user"></i></span>
                    <input class="form-control" type="email" name="mail" placeholder="e-mail">
                </div>
                <div class="form-group">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    <input class="form-control"type="password" name="mdp" placeholder="password">
                </div>

                <button class="btn signin <?php echo $shakeButtonClass; ?>" type="submit">login</button>

                <ul class="form-options">
                    <li><a href="#"></a></li>
                    <li><a href="inscription.php">Create new account</a><i class="fa fa-arrow-right"></i></li>
                </ul>
            </form>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>