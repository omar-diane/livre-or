<?php

session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

    if( !empty($_POST['login']) and !empty($_POST['password']) and  
        !empty($_POST['pass_conf']) ){

        if (isset($_POST['submit']))
        {

                /* on test si les deux mdp sont bien identique */
                if ($_POST['password']===$_POST['pass_conf'])
                {
                    // On crypte le mot de passe
                    $password=($_POST['password']);

                    // On récupère nos valeurs
                    $login= $_POST['login'];

                    //On créé la requête
                    $sql = "INSERT INTO utilisateurs( login, password) VALUES ('$login','$password')";
                    $req=mysqli_query($conn,$sql);
                }
                else echo "Les mots de passe ne sont pas identiques";
        }
    }
    ?>
    <main>
        <form class="box" action="" method="post">
            <h1 class="box-title">INSCRIPTION</h1>
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="pass_conf" placeholder="Confirmaion de mot de passe">
            <input type="submit" name="submit" value="S'inscrire" class="box-button">
        </form>
    </main>
</body>
</html>