<?php
    session_start();
    
    if(!isset($_SESSION['authenticated'])) //Has the session been authenticated?
    {
        if($_POST)
        {
            $pass = $_POST['passwd'];
        }
        
        //Find the selected user's password
        $query = "SELECT password, customerID FROM customer WHERE fname = \"{$_POST['userselect']}\"";
        $result = mysql_query($query,$connection);
        if(!$result){
            die("Database query failed: " . mysql_error());
        }
        $row = mysql_fetch_array($result);
        if($pass != $row[0] || !isset($_POST['userselect']) || is_null($row[0]))
        { ?>
<?php include("includes/header.php"); ?>
			<div id="welcome">
				<p>Welcome!</p>
				<p>Sign in to continue</p>
			</div>
			<div id="sign_in">
				<form method=POST action="index.php">
					User:
					<select name="userselect">
						<option value="">Select</option>
						<?php
						    //Query database for all users
                            $query = "SELECT * FROM customer";
                            $result = mysql_query($query, $connection);
                            if (!$result) {
                                die("Database query failed: " . mysql_error());
                            }//End query
                            while($row = mysql_fetch_array($result)){
                              echo "<option value=\"" . $row[1] . "\">" . $row[1] . "</option>";
                            }
						?>
					</select>
					<br />
					Password:
					<input type="password" name="passwd" />
					<br />
					<input type="submit" value="Enter"/>
				</form>
			</div>
<?php include("includes/footer.php"); ?>
            <?php
            exit;
        } else {
            //Set up SESSION variables:
            $_SESSION['authenticated'] = 1; //Authentication flag
            $_SESSION['password'] = $pass; //password
            $_SESSION['user'] = $_POST['userselect']; //user
            $_SESSION['cid'] = $row[1]; //customer ID
        }
    }//End: !isset($_SESSION['password'])
?>
