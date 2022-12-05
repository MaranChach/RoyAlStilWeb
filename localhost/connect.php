<?php
    function sendSelectQuery($query)
    {
        $connect = pg_connect("host=46.229.214.241 dbname=TrantinDB user=PKS password=PKS")
        or die(pg_last_error());
    
        $result = pg_query($query);

        pg_close($connect);

        return $result;
    }   
    
    function printQueryResult($query)
    {
        $result = sendSelectQuery($query);

        echo "<table>\n";
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
    }
?>