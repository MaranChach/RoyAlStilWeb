<!DOCTYPE html>
<html lang='ru'>

    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="style/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>   
        


         
        <div class="container content">           
            <div class="row">             
                <div class="col-md-4">
                    <form class="list-group" action="index.php" method="post">
                            <?php
                                require_once('connect.php');

                                $result = sendSelectQuery('SELECT * FROM "Main".goods_type');
                                $typeArray = array();
                                
                                while ($line = pg_fetch_row($result))
                                {
                                    $typeArray[$line[0]] = $line[1];
                                    echo ('<input type="submit" name="' . $line[0] . '" href="#" class="list-group-item" value="' . $line[1] . '"></input>');
                                }
                                
                            ?>
                    </form>
                </div>
                
                <div class="col-md-8">                    
                    <?php                     
                        while($type = current($typeArray))
                        {
                            if(isset($_POST[key($typeArray)]))
                            {
                                $resultGoods = sendSelectQuery('SELECT * FROM "Main".goods WHERE goods_type_id = ' . key($typeArray));
                                $elementCounter = 0;
                                while($line = pg_fetch_row($resultGoods))
                                {   
                                    
                                    if(($elementCounter % 3) == 0)
                                    {
                                        echo("<div class=\"row\">\n");
                                    }                                                                      
                                        echo("<div class=\"col-sm-4\">\n");
                                            echo("<form action=\"goodspage.php\" method=\"POST\">");
                                            echo("<div class=\"product\">\n");
                                                echo("<div class=\"product-img\">\n");
                                                    echo("<a href=\"#\"><img src=\"" . $line[6] . "\" alt=\"\"></a>\n");
                                                echo("</div>\n");
                                                echo("<input type=\"hidden\" readonly=\"true\" value=\"".$line[0]."\" name=\"product-id\">\n");
                                                //echo("<input type=\"text\" readonly=\"true\" value=\"".$line[1]."\" name=\"product-title\" class=\"product-title\">\n");
                                                echo("<input type=\"submit\" value=\"".$line[1]."\" name=\"product-title\" class=\"product-title\">\n");
                                                
                                                /*echo("<p class=\"product-title\">\n");
                                                    echo("<a href=\"#\">" . $line[1] . "</a>\n");
                                                echo("</p>\n");*/
                                                echo("<p class=\"product-desc\">Осталось: " . $line[3] . "</p>\n");
                                                echo("<p class=\"product-price\">" . $line[2] . " р.</p>\n");
                                            echo("</div>\n");
                                            echo("</form>");
                                        echo("</div>\n");                                  
                                    if(($elementCounter % 3) == 2)
                                    {
                                        echo("</div>\n");
                                    }

                                    $elementCounter++;                                       
                                }                                
                            }
                            next($typeArray);
                        }
                    ?>                    
                </div>
            </div>
        </div>        
    </body>
</html>