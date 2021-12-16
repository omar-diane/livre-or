<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="stylesheet" href="livreor.css">
</head>
<body>
<header class="haut-de-page">
        <nav>
            <h1 class="logo">LOREM</h1>
            <div class="onglets">
                <p><a href="#">Accueil</a></p>
                <p><a href="inscription.php">Inscription</a></p>
                <p><a href="connexion.php">Connexion</a></p>
            </div>
        </nav>
    </header>
    <?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'livreor');
  
 // Connexion à la base de données MySQL 
 $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
  
 // Vérifier la connexion
 if($conn === false){
     die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
 }
 if(isset($_POST['commentaire']))
 
?>
    <main>
        <form action="" method="post">
     
    <textarea id="commentaire" name="commentaire" cols="50" rows="7"></textarea><br>
     
    <input type="submit" value="Envoyer le commentaire">
        </form>
    </main>
    
</body>
</html>