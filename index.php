<?php require_once("includes/dbconn.php")?>
<?php include("includes/login.php"); ?>
<?php include("includes/getdate.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/process.php"); ?>
<?php include("includes/header.php"); ?>
            <?php $user = $_SESSION['user']; ?>
            <div id="welcome">
                Welcome, <?php echo $user . "!"; ?>
            </div>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
			<div id="week_container">
                <ul>
                    <div id="this_week">This week's spread
                        <?php
                           $result = mysql_query("SELECT * FROM customer", $connection);
                           if(!$result)
                           {
                               die("Database query failed: " . mysql_error());
                           }
                          $row = mysql_fetch_array($result);
                        ?>
                    </div>
                    <form method=POST action="index.php">
                     <?php
                        //Check for canceled order action and run DB delete row routine
                        if(isset($_GET['cancelOrder'])){
                            $query = "DELETE FROM `order` WHERE order_date = \"{$_GET['cancelOrder']}\" AND customerID={$_SESSION['cid']}";
                            $result = mysql_query($query);
                            if(!$result){
                                die("Database query failed: " . mysql_error());
                            }
                        }
                        /***Query returns the DB to get all the user's orders from the current week***/
                        $query = "SELECT order_date, paid FROM `order`
                                  WHERE customerID={$_SESSION['cid']}
                                  AND (
                                  order_date >= '{$mon_db_date}'
                                  AND order_date <= '{$fri_db_date}'
                                  )";
                        $result = mysql_query($query);
                        if (!$result) {
                            die("Database query failed: " . mysql_error());
                        }
                        if($_SESSION['user'] == "Alex"){
                            //If its Alex logging in, run a different query: get all users who bought food this week
                            $query = "SELECT  `order`.order_date,  `order`.paid, `customer`.fname
                                    FROM  `customer` 
                                    INNER JOIN  `order` 
                                    WHERE  `customer`.customerID =  `order`.customerID
                                    AND (
                                    `order`.order_date >=  '{$mon_db_date}'
                                    AND order_date <=  '{$fri_db_date}'
                                    )";
                            $result = mysql_query($query);
                            if(!$result){
                                die("Database query failed: " . mysql_error());
                            }
                        }
			        //echo "Order #: " . $_GET['cancelOrder'];
			        ?>
                    <div id="days">
                        <li>Monday</li>
                        <div id="date"><?php echo $mon ?></div>
                        <?php
                        //Only display the check box if the user hasn't placed an order for that day
                            displayCheckbox($mon_db_date, $result);
                        ?>
                    </div>
                    <div id="days">
                        <li>Tuesday</li>
                        <div id="date"><?php echo $tues ?></div>
                        <?php
                        //Only display the check box if the user hasn't placed an order for that day
                            displayCheckbox($tues_db_date, $result);
                        ?>                
                    </div>
                    <div id="days">
                        <li>Wednesday</li>
                        <div id="date"><?php echo $wed ?></div>
                        <?php
                        //Only display the check box if the user hasn't placed an order for that day
                            displayCheckbox($wed_db_date, $result);
                        ?>
                    </div>
                    <div id="days">
                        <li>Thursday</li>
                        <div id="date"><?php echo $thurs ?></div>
                        <?php
                        //Only display the check box if the user hasn't placed an order for that day
                            displayCheckbox($thurs_db_date, $result);
                        ?>
                    </div>
                    <div id="days">
                        <li>Friday</li>
                        <div id="date"><?php echo $fri ?></div>
                        <?php
                        //Only display the check box if the user hasn't placed an order for that day
                            displayCheckbox($fri_db_date, $result);
                        ?>
                    </div>
                        <p><input type="submit" /></p>
                    </form>
                </ul>
            </div>
			<!-- <div id="month">This will be the month view</div> -->
<?php include("includes/footer.php"); ?>
<?php include("includes/closeconn.php"); ?>
