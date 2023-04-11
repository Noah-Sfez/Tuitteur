<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        //var_dump($pdo);
        session_start();
        $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
        $user_id=  $_SESSION['user_id'];
    ?>
    <div class="header">
        <div class="nav-bar">
        <img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo">
        <a href="index.php" class="nav">Home</a>
        <a href="" class="nav">Bookmarks</a>
        <a href="profil.php" class="nav">Profil</a>
        <a href="" class="nav">Explore</a>
        <a href="" class="nav">Settings </a>
        </div> 
        <button id="myBtn" class="btn-modal">Tueets</button>

        <div id="myModal" class="modal">
        <div class="modal-content">
      <span class="close">&times;</span>
      <div class="prof-modal">
        <?php
        $i = $pdo->query('SELECT * FROM users');
        ?>
        <h3></h6>
      </div>
      <form action="" method="post">
        <textarea name="tweet" id="" cols="60" rows="7" class="modal-tweet" placeholder="What's happening ?" required></textarea>
        <select name="genre" id="" class="type_tweet" required>
        <option value="">Type</option>
          <option value="Sport" class="sport">Sport</option>
          <option value="Politique" class="politique">Politique</option>
          <option value="Musique" class="musique">Musique</option>
          <option value="Divertissement" class="divertissement">Divertissement</option>
          <option value="Cinéma" class="cinema">Cinéma</option>
          <option value="Voyage" class="voyage">Voyage</option>
          <option value="Cuisine" class="cuisine">Cuisine</option>
          <option value="Art" class="art">Art</option>
        </select>
        <input type="submit" value="Tuitts" class="tuitts-modal">
      </form>
      </div>
    </div>
    <div class="profil">
      <div class="img-profil">
        <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil">
      </div>
      <div class="utilisateur">
        <p>@<?php  echo $_SESSION['pseudo']; ?></p>
        <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
      </div>
    </div>
</div>
<main>
  
    <div class="head-profil">
        <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="banniere-profil">
        <div class="head">
            <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="head-img">
            <h3 class="head-name"><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></h3>
            <p class="head-pseudo">@<?php echo $_SESSION['pseudo']; ?></p>
        </div>
        <div class="profil-tweet">
          <?php
            $rqt= "SELECT * FROM tweet WHERE id_users=$user_id ORDER BY date_heure_message DESC";
            $result = $pdo->query($rqt);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="tweet_content">';
              echo '<div class="pseudo_message">';
              echo '<span class="pseudo_tweet">' . $_SESSION['pseudo'] . '</span><br>';
              echo '<span class="message_tweet">' .$row['message'] . '</span><br>';
              echo '</div>';
              echo '<div class="date_supprimer">';
              echo $row['date_heure_message'] . '<br>';
              echo '<a href="?id_tweet=' . $row['id_tweet'] . '"><img src="./images/poubelle.png" alt="Supprimer" class="poubelle"></a><br><br>';
              echo '<div class="type_response">';
              echo $row['type'];
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          ?>
        </div>
    </div>
    
  






    <?php
  $allusers=$pdo->query('SELECT * FROM tweet ORDER BY id_tweet DESC');
  if(isset($_GET['value_recherche']) AND !empty($_GET['value_recherche'])){
    $recherche=($_GET['value_recherche']);
    $allusers = $pdo->query('SELECT message, date_heure_message, type FROM tweet WHERE message LIKE "%' .$recherche.'%" ORDER BY id_tweet DESC');
  }
  ?>
  <div class="espace_recherche">
      <form action="" method="get" class="form-recherche" name="fo">
        <input type="search" class="rech" name="value_recherche">
        <input type="submit" value="Rechercher" class="rechercher" name="valider">
      </form>
      <div class="affichage_tweet">
        <?php
          if($allusers->rowCount() > 0){
              while($user = $allusers->fetch()){
                ?>
                <div class="message_recherche">
                  <p class="tweet_recherche"> <?php echo $user['message']; ?></p>
                  <p class="date_recherche"> <?php echo $user['date_heure_message'] . ' ' . $user['type']; ?></p>
                </div>
                <?php
              }
          } else{
            ?>
            <p class="no_tweet">Pas de tweets trouvés</p>
            <?php
          }
        ?>
      </div>
    </div>
    <div class="last">
      <a href="inscription.php" class="deconnexion">Déconnexion</a>
      <form action="" method="post">
        <input type="submit" value="Sport">
        <input type="submit" value="Politique">
        <input type="submit" value="Musique">
        <input type="submit" value="Divertissement">
        <input type="submit" value="Cinéma">
        <input type="submit" value="Voyage">
        <input type="submit" value="Cuisine">
        <input type="submit" value="Art">
      </form>
    </div>







</main>
<script src="app.js"></script>
</body>
</html>