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
<header class="main-head">
        <nav>
            <h1 id="logo">LOREM</h1>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php include "header.php"; ?>
            </ul>
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

 if(isset($_POST['commentaire'])){
     if(isset($_POST['submit'])){
     $commentaire = mysqli_real_escape_string($conn,(htmlspecialchars($_POST['commentaire'])));
     $commentaire = nl2br($commentaire);

     $id_utilcheck = (int) $_SESSION['connected'];
     $date = date("Y-m-d H:i:s");

     $sql = "INSERT INTO commentaires(commentaire, id_utilisateurs, date) VALUES ('$commentaire', '$id_utilcheck', '$date')";
     $req=mysqli_query($conn,$sql);
     }
    }

?>

    <main>
    <form class="comments" action="" method="post">
     <h3>Laisse un commentaire</h3>
    <textarea id="commentaire" name="commentaire" cols="50" rows="7"></textarea><br>
    <input type="submit" name="submit" value="Envoyer le commentaire">
        </form>
    </main>
</body>
</html>