<?php

require './bdd.php';

if (isset($_POST['sub'])) {
    if (
            !empty($_POST['Name']) && 
            !empty($_POST['quantity']) &&
            !empty($_POST['URL'])
        )    
    {
        $Namep = htmlspecialchars($_POST['Name']);
        $Quantity = htmlspecialchars($_POST['quantity']);
        $URLIMAGE = htmlspecialchars($_POST['URL']);

        $req = $bdd->prepare('INSERT INTO products SET productname = ?, quantity = ?, urlimage = ?');
        $req->execute([$Namep, $Quantity, $URLIMAGE]);
        $req->closeCursor();

        header("Location: liste.php");
    } else {
        echo "<script>alert(\"Vous n'avez pas remplis tout les champs\")</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajoutez un produit</title>
    </head>
    <body>
        <form action="" method='POST'>
            <label for='Name'>Nom du produit :</label>
            <input type="text" name="Name" id="Name" >
            <label for='quantity'>Quantité :</label>
            <input type="number" name="quantity" id="quantity" >
            <label for='URL'>URL de l'image :</label>
            <input type="text" name="URL" id="URL" >
            <input type="submit" name='sub' value="Ajoutez">
        </form>
    </body>
</html>