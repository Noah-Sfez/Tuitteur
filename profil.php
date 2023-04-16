<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
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
    <a href="#" class="nav-button"><img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo logo-resp"></a>
        <div class="nav-bar">
        <img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo logo-cache">
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
      </div>
      <form action="" method="post">
        <textarea name="tweet" id="" cols="60" rows="7" class="modal-tweet monTweet" placeholder="What's happening ?" required></textarea>
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
        <label for="image_tweet" class="custom-file-upload">
            <img src="./images/input-media.png" alt="Uploader une image" class="input-media">
        </label>
        <input type="file" accept="image/png, image/jpeg, image/gif" name="image_tweet" id="image_tweet" style="display:none;">
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
              echo '<div class="tweet_content ' . $row['type'] .' content-respo">';
              echo '<div class="pseudo_message">';
              echo '<span class="pseudo_tweet">' . $_SESSION['pseudo'] . '</span><br>';
              echo '<span class="message_tweet">' .$row['message'] . '</span><br>';
              if(isset($row['image_chemin']) && !empty($row['image_chemin'])) {
                echo '<img src="' . $row['image_chemin'] . '" alt="" class="image-tweet">';
              }
              echo '</div>';
              echo '<div class="date_supprimer">';
              echo $row['date_heure_message'] . '<br>';
              echo '<a href="?id_tweet=' . $row['id_tweet'] . '"><img src="./images/poubelle.png" alt="Supprimer" id="supp" class="poubelle"></a><br><br>';
              echo '<div class="type_response">';
              echo $row['type'];
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            if(isset($_GET['id_tweet'])){
              $tweet_id = $_GET['id_tweet'];
              var_dump($tweet_id);
            }
          //var_dump($tweet_id);
        ?>
        <script>
          var tweet_id = <?php echo $tweet_id;?>;
        </script> 
        <div id="confirm-modal-delete">
          <div class="confirm-modal-content">
            <p class="confirm-quest">Voulez-vous vraiment supprimer ce tweet ?</p>
            <div class="button-modal-delete">
              <a href="#" id="cancel-modal-tweet">Annuler</a>
              <?php echo '<a href="delete.php?supprimer='. $tweet_id . '" class="confirm-delete-tweet">Supprimer</a>'; ?>
            </div>
          </div>
        </div>
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
        <input type="search" class="rech" name="value_recherche" placeholder="Search">
        <input type="submit" value="Rechercher" class="rechercher" id="rechercher" name="valider">
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
      <div class="filter-buttons">
        <button class="filter-btn buttons-all sport" data-tag="Sport">Sport</button>
        <button class="filter-btn buttons-all politique" data-tag="Politique">Politique</button>
        <button class="filter-btn buttons-all musique" data-tag="Musique">Musique</button>
        <button class="filter-btn buttons-all divertissement" data-tag="Divertissement">Divertissement</button>
        <button class="filter-btn buttons-all cinema" data-tag="Cinéma">Cinéma</button>
        <button class="filter-btn buttons-all voyage" data-tag="Voyage">Voyage</button>
        <button class="filter-btn buttons-all cuisine" data-tag="Cuisine">Cuisine</button>
        <button class="filter-btn buttons-all art" data-tag="Art">Art</button>
      </div>
        <a href="profil.php" class="reset-filter">Reset filter</a>
    </div>
    <div class="header">
    <div class="lost">
      <div class="filter-buttons">
        <button class="filter-btn buttons-all sport" data-tag="Sport">Sport</button>
        <button class="filter-btn buttons-all politique" data-tag="Politique">Politique</button>
        <button class="filter-btn buttons-all musique" data-tag="Musique">Musique</button>
        <button class="filter-btn buttons-all divertissement" data-tag="Divertissement">Divertissement</button>
        <button class="filter-btn buttons-all cinema" data-tag="Cinéma">Cinéma</button>
        <button class="filter-btn buttons-all voyage" data-tag="Voyage">Voyage</button>
        <button class="filter-btn buttons-all cuisine" data-tag="Cuisine">Cuisine</button>
        <button class="filter-btn buttons-all art" data-tag="Art">Art</button>
        <a href="index.php" class="reset-filter lost">Reset filter</a>
        <a href="inscription.php" class="deconnexion lost" id="deconnexion">Déconnexion</a>
      </div>
        <a href="index.php" class="reset-filter lost">Reset filter</a>
        <a href="inscription.php" class="deconnexion lost" id="deconnexion">Déconnexion</a>
    </div>
    </div>
</main>
<script src="app.js"></script>
</body>
</html>