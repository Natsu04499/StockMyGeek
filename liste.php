<?php
session_start();
require "./bdd.php";
$req_products = $bdd->query("SELECT * FROM products");

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
<div>
            <h1>Stock My Geek</h1>
        <table>
        <thead>
            <tr>
                <th colspan="2">Nom du produit</th>
                <th colspan="2">Quantité</th>
                <th colspan="2">Image</th>
            </tr>
        </thead>
        <tbody>
    <?php
while($products = $req_products->fetch()){?>
<div>
        <tr>
            <td colspan="2"> <?php echo $products["productname"]; ?> </td>
            <td colspan="2"> <?php echo $products["quantity"];   ?> </td>
            <td colspan="10"> <p><a href='deleteproducts.php?id=<?php echo $products ['id']; ?>'> Supprimez</a> </p> 
            <td colspan="10"> <p><a href="editproducts.php?id=<?php echo $products ['id']; ?>">Modifiez</a> </p>
            <td colspan="10"> <img src=<?php echo $products["urlimage"]; ?> > </td>
        </tr>
</div>
    <?php

}?>
</div>    

    <div>
    <a href="newproduct.php">Nouveau Produit</a>
    </div>

</body>
</html>