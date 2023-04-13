<?php

require './bdd.php';

if (isset($_POST['sub'])) { 
    if (
            !empty($_POST['quantity'])
        )    
    {
        $id = $_GET['id']; 
        $quantity = htmlspecialchars($_POST['quantity']);

        $req = $bdd->prepare("UPDATE products SET quantity = ?");
        
        $req->execute([$quantity, $id]);
      
        $req->closeCursor();
        
        
        header("Location: liste.php");
    }
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
        <?php
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $product = $bdd->query("SELECT * FROM products WHERE id = $id")->fetch(); }
        ?>
        <form action="" method='POST'>
            <label for='quantity'>Quantity :</label>
            <input type="number" name="quantity" >
            <input type="submit" name='sub' value="Edit" >
        </form>
    </body>
</html>