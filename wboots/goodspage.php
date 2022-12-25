<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" />
</head>
<body>
<div class="left-column"><img src="images/black.png" alt="" data-image="black" /> <img src="images/blue.png" alt="" data-image="blue" /> <img class="active" src="images/red.png" alt="" data-image="red" /></div>
    
    <div>
        <div >

        </div>
    </div>

    <?php
        if(isset($_POST["product-id"])){
            $productid = $_POST["product-id"];
        }
            
        if(isset($_POST["product-title"])){
            $producttitle = $_POST["product-title"];
        }
        
        echo("<p>" . $productid . "</p>");
        echo("<p>" . $producttitle . "</p>");

    ?>
</body>
</html>

