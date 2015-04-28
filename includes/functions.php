<?php
    //Displays a checkbox if the user hasn't made an order for the day, otherwise indicates an order has been placed.
    function displayCheckbox($dbDate, $result){
        if(mysql_affected_rows()){
            //Don't run if there are 0 rows
            mysql_data_seek($result, 0);
        }
        $output_checkbox = 1;
        while($row = mysql_fetch_array($result)){
            if ($row[0] == $dbDate){
                if($_SESSION['user'] == "Alex"){//Is the admin
                    echo "<p>{$row[2]}-->";
                    if(!$row[1]){//If the user hasn't paid
                        ?><input type="checkbox" name="paidcb[]" value="<?php echo $row[2] . " " . $dbDate; ?>" /> Paid?</p><?php
                    }
                    else {
                        echo "Paid</p>";
                    }
                }
                else{
                    if(!$row[1]){//If the user hasn't paid
                        echo "<p>Not paid</p>";
                    }
                    echo "<div id=\"ordered\">--Ordered--</div><a href=\"index.php?cancelOrder={$dbDate}\"><p>[X] Cancel Order</p></a>";
                    $output_checkbox = 0;
                    break;
                    }
            }
        }
        if($_SESSION['user'] != "Alex"){
            if($output_checkbox){
                echo "<input type=\"checkbox\" name=\"daycb[]\" value=\"{$dbDate}\" /> I want lunch!<br/><p>&nbsp</p>";
            }
        }
    }//End displayCheckbox
    
    function didPay(){
        
    }
    
?>