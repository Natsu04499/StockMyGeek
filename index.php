<?php
session_start();
require "./bdd.php";

if(isset($_POST["connexion"])){
    if(!empty($_POST["username"]) and !empty($_POST["password"])){

        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $get_users = $bdd->prepare('SELECT * FROM users WHERE usrname = ? and passw = ?');
        $get_users->execute(array($username,$password));
         
        
        if($get_users->rowCount() >0 ){

            $_SESSION ["username"] = $get_users->fetch();

            header("Location: liste.php");

        }else echo "<script>alert(\"Les identifiants sont éronnée\")</script>";
    }else echo "<script>alert(\"Veuillez saisirs les identifiants\")</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
        <div> 
            <label for='username'>Votre nom d'utilisateurs :</label> 
            <input type='text' name='username'>
    
        </div>
        <div> 
            <label for='password'>Votre mot de passe :</label> 
            <input type='password' name='password'>
    
        </div>
        <div>
            <input type="submit" name="connexion" value='Connexion'>
        </div>
    </form>

</body>
</html>