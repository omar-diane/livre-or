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
                <p><a href="index.php">Accueil</a></p>
                <p><a href="connexion.php">Connexion</a></p>
                <p><a href="inscription.php">Inscription</a></p>
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
    
$utilcheck=0;

if(!empty($_POST['login']) and !empty($_POST['password'])){

    $login = $_POST['login'];

    $sql = "SELECT login, password, id FROM utilisateurs WHERE login = '$login' ";
    $query = $conn->query($sql) ;
    $res = mysqli_fetch_row($query);
    
    if($_POST['login'] === $res[0]){
        $utilcheck++;
    } else {
        echo 'Login incorrect';
    } 
    if($_POST['password'] === $res[1]){
        $utilcheck++;
    } else {
        echo 'Mot de passe incorrecte';
    }
    if($utilcheck === 2){
        $_SESSION['connected']=$res[2];
        $id_utilcheck = $_SESSION['connected'];
    header('Location: profil.php');
    }
}
?>
    <main>
        <form class="box" action="" method="post">
            <h1 class="box-title">CONNEXION</h1>
            <input type="text" class="box-input" name="login" placeholder="Login">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" class="box-button" name="submit" value="Se connecter">
        </form>
    </main>
</body>
</html>