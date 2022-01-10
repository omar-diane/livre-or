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
                <p><a href="inscription.php">Inscription</a></p>
                <p><a href="#">Connexion</a></p>
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
$admin=0;

if(!empty($_POST['login']) and !empty($_POST['password'])){

    $login = $_POST['login'];

    $sql = "SELECT login, password, id FROM utilisateurs WHERE login = '$login' ";
    $query = $conn->query($sql) ;
    $res = mysqli_fetch_row($query);
    
    if($_POST['login'] === $res[0] and $_POST['login'] !== 'admin' ){
        $utilcheck++;
    } elseif ( $_POST['login'] === 'admin' ){
        $admin++;
    }
    if($_POST['password'] === $res[1] and $_POST['password'] !== 'admin'){
        $utilcheck++;
    } elseif ( $_POST['password'] === 'admin' ){
        $admin++;
    }
    if($utilcheck === 2){
        $_SESSION['connected']=$res[2];
    header('Location: profil.php');
    } elseif ($admin === 2){
        $_SESSION['adconnected']= $_POST['login'];
        header('Location: admin.php');
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