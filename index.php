<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
//var_dump($_SESSION['user_photo']);
?>

<div class="header">
    <a href="#" class="nav-button">
      <div class="click">
        <p>Click Me</p>
        <img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo logo-resp">
        </div>
    </a>
    <div class="nav-bar">
        <img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo logo-cache">
        <a href="#" class="nav">Home</a>
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
      <form action="" method="post" enctype="multipart/form-data">
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
    <?php
    $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="profil">
      <div class="img-profil">
        <a href="profil.php"><img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil"></a>
      </div>
      <div class="utilisateur">
        <p>@<?php  echo $_SESSION['pseudo']; ?></p>
        <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
      </div>
    </div>
</div>
      
    <main>
    <div class="center center-respo">
      <script>
        var session = <?php echo $_SESSION;?>
      </script>
      <?php
          if(isset($_SESSION) && !empty($_SESSION)){
            echo "<h2 class='maison'>Bonjour " . $_SESSION['pseudo'] . "</h2>";
        } else {
            echo "<div class='maison'>";
            echo "<h3>Home</h3>";
            echo "</div>";
            echo "<div class='modal-connect'>";
            echo "<div class='modal-content-connect'>";
            echo "<h2 class='title-modal-connect'>Connectez vous pour accéder à Tuitteur</h2>";
            echo "<div class='button-modal-connect'>";
            echo "<a href='inscription.php' class='inscrip-modal-connect'>S'inscrire</a>";
            echo "<a href='connexion.php' class='connex-modal-connect'>Se connecter</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        };
          ?>
      <form action="" method="post" enctype="multipart/form-data">
        <textarea name="tweet" id="message" cols="68" rows="10" placeholder="Tuitter" class="text_tweet monTweet" required></textarea>
        <select name="genre" id="nav_type" class="type_tweet" required>
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
        <input type="file" accept="image/png, image/jpeg image/gif" name="image_tweet" class="media" id="image_tweet" style="">
        <input type="submit" id="poster" value="Tuitts" class="poster">
      </form>
      <?php
      $destination = NULL;
        if($_POST){
          if(isset($_FILES['image_tweet'])){
            $image_name = $_FILES['image_tweet']['name'];
            $tmp_name = $_FILES['image_tweet']['tmp_name'];
            if ($_FILES['image_tweet']['size'] <= 2097152) {
              $dossier = './stockfile/';
              $destination = $dossier . $image_name;
              move_uploaded_file($tmp_name, $destination);
              echo 'Votre image a été téléchargée avec succès !';
              }else{
                echo 'La taille de votre image doit être inférieure à 2 MO';
              }
            } 
          $_POST['tweet'] = addslashes($_POST['tweet']);
          $pdo->exec("INSERT INTO tweet (message, date_heure_message, type, image_chemin, id_users) VALUES ('$_POST[tweet]', NOW(), '$_POST[genre]', '$destination',  '{$_SESSION['user_id']}')");
        }
        $t = $pdo->query('SELECT t.id_tweet, t.message, t.date_heure_message, t.type, t.image_chemin, u.pseudo, u.user_photo FROM tweet t INNER JOIN users u ON t.id_users = u.id_users ORDER BY t.date_heure_message DESC');
      ?>
      <div class="other-tweet">
  <?php
    while($tweet = $t->fetch(PDO::FETCH_ASSOC)){
      echo '<div class="tweet_content ' . $tweet['type'] .' ">';
      echo '<div class="pseudo_message">';
      echo '<span class="pseudo_tweet">' . $tweet['pseudo'] . '</span><br>';
      echo '<span class="message_tweet">' .$tweet['message'] . '</span><br>';
      if(isset($tweet['image_chemin']) && !empty($tweet['image_chemin'])) {
        echo '<img src="' . $tweet['image_chemin'] . '" alt="" class="image-tweet">';
      }
      echo '</div>';
      echo '<div class="heure_type">';
      echo '<div class="date_supprimer">';
      echo $tweet['date_heure_message'] . '<br>';
      echo '</div>';
      echo '<div class="type_response" id="type_resp">';
      echo $tweet['type'];
      echo '</div>';
      echo '</div>';
      echo '</div>';
     }
?>
</div>
  </div>
  <?php
  $allusers=  $pdo->query('SELECT t.id_tweet, t.message, t.date_heure_message, t.type, u.pseudo, u.user_photo FROM tweet t INNER JOIN users u ON t.id_users = u.id_users ORDER BY t.date_heure_message DESC');
  if(isset($_GET['value_recherche']) AND !empty($_GET['value_recherche'])){
    $recherche=($_GET['value_recherche']);
    $allusers = $pdo->query('SELECT message, date_heure_message, type, id_users FROM tweet WHERE message LIKE "%' .$recherche.'%" ORDER BY id_tweet DESC');
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
      <a href="inscription.php" class="deconnexion" id="deconnexion">Déconnexion</a>
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
        <a href="index.php" class="reset-filter">Reset filter</a>
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
      </div>
        <a href="index.php" class="reset-filter lost">Reset filter</a>
        <a href="inscription.php" class="deconnexion lost" id="deconnexion">Déconnexion</a>
    </div>
    </div>



    </main>
    <script src="app.js"></script>
</body>
</html>