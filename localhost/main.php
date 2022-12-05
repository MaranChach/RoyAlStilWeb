<?php
    require_once("connect.php");

    $name = $_POST["nameField"];
    $cost = $_POST["cost"];
    $remind = $_POST["remind"];
    $used = $_POST["used"];
    $type = $_POST["type"];


    /*$result = sendSelectQuery("INSERT INTO \"Main\".goods (name, cost, remind, used, goods_type_id) 
        VALUES ('" . $name . "','" 
                  . $cost . "','" 
                  . $remind . "','" 
                  . $used . "','" 
                  . $type . "') RETURNING id_goods"); */

    echo printQueryResult();
?>