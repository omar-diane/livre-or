<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    $_SESSION["connected"];
    foreach($users as $user){
        if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && password_verify($_POST['password'],$user[2]) == true){
            $_SESSION["connected"] = $_POST["login"] ;
            header("Location:index.php");
        }
        if ( isset($_POST["login"]) && $_POST["login"] == $user[1] && $_POST['password'] == $user[2]){
            $_SESSION["connected"] = $_POST["login"] ;
            header("Location:index.php");
        }
    }
    ?>
    <main>
        <form action="" method="post">
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" name="submit" value="Se connecter">
        </form>
    </main>
</body>
</html>