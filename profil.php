<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="livreor.css">
</head>
<body>
<header class="haut-de-page">
        <nav>
            <h1 class="logo">LOREM</h1>
            <div class="onglets">
                <p><a href="index.php">Accueil</a></p>
                <?php include "header.php"; ?>
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
$id=$_SESSION['connected'];
    $query="SELECT * FROM utilisateurs WHERE id='$id'";
    $req=mysqli_query($conn,$query);
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);

    ?>
   
    <main>
    <form class="box" action="" method="post">
<h1 class="box-title">Modifier mon profil</h1>
<input type="text" class="box-input" name="login" value="<?php echo $res[0]['login'];?>">
<input type="password" class="box-input" name="password" value="<?php echo$res[0]['password'];?>">
<input type="submit" value="Modifier " name="submit" class="box-button">
</form>
<?php


if(!empty($_POST['login'])and
   !empty($_POST['password'])){

       if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $sql = "UPDATE utilisateurs SET login='$login', password='$password' WHERE id='$id'";
        $req=mysqli_query($conn,$sql);
       }
   }
?>
    </main>
    
</body>
</html>