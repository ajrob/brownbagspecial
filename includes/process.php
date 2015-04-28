<?php
    if (isset($_POST['daycb'])) {
        $whichcb = $_POST['daycb'];
        /*echo "Count: " . count($whichcb) . "<br />"; //Debug
        echo "User: " . $_SESSION['user'] . "<br />";  //Debug*/
        
        //Insert orders into db
        foreach ($whichcb as $value) {
            $query = "INSERT INTO `order` (`orderID`, `customerID`, `order_date`, `paid`)
                  VALUES (NULL, '{$_SESSION['cid']}', '{$value}', '0')";
            $result = mysql_query($query,$connection);
            if(!$result){
                die("Database query failed: " . mysql_error());
            }
            // echo $_SESSION['user'] . " has ordered lunch on: " . $value . "<br />"; //Debug
        }
    }
    //Checks for paid
    if(isset($_POST['paidcb'])){
         $whichpaidcb = $_POST['paidcb'];
         //Update the order on the specific date to paid=1
         foreach ($whichpaidcb as $value){
             $paid = explode(" ", $value                     );
             $query = "UPDATE `order` SET paid=1
                       WHERE `order_date`='{$paid[1]}' AND customerID=(SELECT customerID FROM `customer` WHERE fname=\"{$paid[0]}\")";
             $result = mysql_query($query);
             if(!$result){
                 die("Database query failed: " . mysql_error());
             }
         }
     }
?>