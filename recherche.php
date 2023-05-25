<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./images/lotus-symbol.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
//var_dump($_SESSION['user_photo']);
?>
<body>
    <div class='overlay'></div>
    <button class='button-menu profil-page'>Menu</button>
    <header class="header">    
<!-- J'affiche ici la barre de navigation -->
            <div class="nav-bar">
                <a href="index.php" class="nav">Home</a>
                <a href="" class="nav">Bookmarks</a>
                <a href="profil.php" class="nav">Profil</a>
                <a href="recherche.php" class="nav">Explore</a>
                <a href="settings.php" class="nav">Settings </a> 
            </div> 
<!-- J'affiche le modal qui est géré après avec du JavaScript -->
            <button id="myBtn" class="btn-modal">Composer</button>
            <div id="myModal" class="modal">
                <div class="modal-content">
                <span class="close">&times;</span>
                <div class="prof-modal">
                <?php
                $i = $pdo->query('SELECT * FROM users');
                ?>
                </div>
<!-- Ici on retrouve le form qui est dans le modal pour gérer le post des tweets -->
                <form action="" method="post" enctype="multipart/form-data">
                    <textarea name="tweet" id="messagemodal" cols="60" rows="7" class="modal-tweet monTweet" placeholder="What's happening ?" required></textarea>
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
                    <input type="file" accept="image/png, image/jpeg image/gif" name="image_tweet" class="media" id="image_tweet" style="">
                    <input type="submit" value="Tuitts" class="tuitts-modal" id="bouton">
                </form>
                </div>
            </div>
<!-- Ici j'ai le code pour générer les photos et bannières de profil aléatoirement avec l'url rentrée dans la base de donnée -->
            <?php
            $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
            ?>
<!-- Ici on a le code qui affiche le nom de l'utilisateur ainsi que son pseudo et la photo de profil -->
            <div class="profil">
                <div class="img-profil">
                <a href="profil.php"><img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil"></a>
                </div>
                <div class="utilisateur">
                <p>@<?php  echo $_SESSION['pseudo']; ?></p>
                <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
                </div>
            </div>
        </header>
        <main class="main_recherche">
            <div class="background-search">
                <h1>Rechercher</h1>
                <div class="recherche-profil-tweet">
                    <div class="recherche-tweets">
                        <?php
                        $alltweets = $pdo->query('SELECT t.id_tweet, t.message, t.date_heure_message, t.type, u.pseudo, u.user_photo 
                        FROM tweet t INNER JOIN users u ON t.id_users = u.id_users 
                        ORDER BY t.date_heure_message DESC');

                        if(isset($_GET['value_recherche']) && !empty($_GET['value_recherche'])){
                            $recherche = $_GET['value_recherche'];
                            $alltweets = $pdo->query('SELECT t.id_tweet, t.message, t.date_heure_message, t.type, u.pseudo, u.user_photo 
                                FROM tweet t INNER JOIN users u ON t.id_users = u.id_users 
                                WHERE t.message LIKE "%' . $recherche . '%" 
                                ORDER BY t.date_heure_message DESC');
                        }
                        ?>
                        <div class="espace_recherche_tweet">
                            <div class="title-form-tweet">
                                <h2 class="title-rechercher">Recherchez vos tweets préférés</h2>
                                <form action="" method="get" class="form-recherche-tweet" name="">
                                    <input type="search" class="rech" name="value_recherche" placeholder="Mots clés...">
                                    <label for="search-input-tweet" class="search-icon-label">
                                        <i class="fa fa-search icone-rechercher"></i>
                                    </label>
                                    <input type="submit" id="search-input-tweet" class="rechercher" name="valider" value="Rechercher">
                                </form>
                            </div>
                            <div class="affichage_tweet">
                                <?php
                                if($alltweets && $alltweets->rowCount() > 0){
                                    while($tweets = $alltweets->fetch()){
                                        //var_dump($tweets['pseudo']);
                                        echo '<a href="user.php?profil='. $tweets['pseudo'] . '">';
                                        echo '<div class="message_recherche_tweet">';
                                        echo      '<p class="pseudo_recherche">'. $tweets['pseudo']. '</p>';
                                        echo      '<p class="tweet_recherche">'.  $tweets['message'].'</p>';
                                        echo      '<p class="date_recherche">'.  $tweets['date_heure_message'] . ' ' . $tweets['type'].'</p>';
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                } else {
                                ?>
                                    <p class="no_tweet">Pas de tweets trouvés</p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="recherche-profil">
                    <?php
                        $allusers=  $pdo->query('SELECT * FROM users');
                        if(isset($_GET['value_recherche_user']) AND !empty($_GET['value_recherche_user'])){
                            $rechercheUser=($_GET['value_recherche_user']);
                            $allusers = $pdo->query('SELECT pseudo, prenom, nom FROM users WHERE pseudo LIKE "%' .$rechercheUser.'%" OR prenom LIKE "%' .$rechercheUser. '%" OR nom LIKE "%' .$rechercheUser. '%"');
                        }
                        ?>
                        <div class="espace_recherche_user">
                        <h2 class="title-rechercher">Recherchez vos profils favoris</h2>
                            <form action="" method="get" class="form-recherche-user" name="fo">
                                <input type="search" class="rech" name="value_recherche_user" placeholder="Pseudo, prénom, nom...">
                                <label for="search-input" class="search-icon-label">
                                    <i class="fa fa-search icone"></i>
                                </label>
                                <input type="submit" id="search-input" class="rechercher" name="valider" value="Rechercher">
                                
                            </form>

                            <div class="affichage_user">
                            <?php
                                if ($allusers->rowCount() > 0) {
                                    while ($user = $allusers->fetch()) {
                                        echo '<a href="user.php?profil='. $user['pseudo'] . '">';
                                        echo '<div class="message_recherche_user">';
                                        echo '<div><i class="fa fa-user icone-recherche-profil"></i></div>';
                                        echo '<div class="message-prenom">';
                                        echo '<p class="user_recherche">'.$user['pseudo'].' </p>';
                                        echo '<p class="prenom_nom">'. $user['prenom'] . ' ' . $user['nom'].'</p>';
                                        echo '</div>';
                                        echo '</div>';                                   
                                        echo '</a>';
                                    }
                                } else {
                                    echo '<p class="no_tweet">Pas de profils trouvés</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
            const navButton = document.querySelector('.button-menu');
            const navBar = document.querySelector('.nav-bar');
            const overlay = document.querySelector('.overlay');

            navButton.addEventListener('click', function(){
            navBar.classList.toggle('active');
            overlay.classList.toggle('show');
            })
        </script>
</body>
</html>