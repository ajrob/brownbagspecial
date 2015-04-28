<?php include("includes/login.php"); ?>
<?php include("includes/getdate.php"); ?>
<html>
	<head>
		<title>
			Brown Baggin' It
		</title>
		<link rel="stylesheet" type="text/css" href="main.css" />
		
		<style type="text/css"> 
            #myGroup {visibility:hidden} 
            </style> 
        <script type="text/javascript"> 
            function toggle(chkbox, group) { 
                var visSetting = (chkbox.checked) ? "visible" : "hidden"; 
                document.getElementById(group).style.visibility = visSetting; 
            } 
            function swap(radBtn, group) { 
                var modemsVisSetting = (group == "modems") ? ((radBtn.checked) ? "" : "none") : "none"; 
                document.getElementById("modems").style.display = modemsVisSetting; 
            }
        </script>
		
		<script src="javascripts/jquery.js"></script>
        
	</head>
	
	<header>
        What'll it be?
	</header>
    <div id="body_wrapper">
        <body>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
			<div id="week_container">
                <ul>
                    <div id="this_week">
                        This week's spread
                    </div>
                    <div id="days">
                        <li>Monday</li>
                        <div id="date"><?php echo $mon ?></div>
                        <form>
                            
                            <select name="mondayname">
                                <option>Alex</option>
                                <option>Robert</option>
                                <option>Kim</option>
                            </select>
                            
                        </form>
                        <p><tt id="results"></tt></p>
                    </div>
                    <div id="days">
                        <li>Tuesday</li>
                        <div id="date"><?php echo $mon ?></div>
                        <form method=POST action="process.php"> 
                            <input type="checkbox" name="monitor" value="Monday" onclick="toggle(this, 'myGroup')" /> I want lunch!
                            <span id="myGroup">
                                <div><i>edit</i></div>
                            </span>
                    </div>
                    <div id="days">
                        <li>Wednesday</li>
                        <div id="date"><?php echo $wed ?></div>
                        <form>
                            <input type="checkbox" name="user" value="user1" /> I want lunch!<br/>
                        </form>
                    </div>
                    <div id="days">
                        <li>Thursday</li>
                        <div id="date"><?php echo $thurs ?></div>
                        <form>
                            <input type="checkbox" name="user" value="user1" /> I want lunch!<br/>
                        </form>
                    </div>
                    <div id="days">
                        <li>Friday</li>
                        <div id="date"><?php echo $fri ?></div>
                        <form>
                            <input type="checkbox" name="user" value="user1" /> I want lunch!<br/>
                        </form>
                    </div>
                </ul>
            </div>
			<div id="month">This will be the month views</div>
			
			<!--Serializes a form to a query string that can be sent to a server in an Ajax request-->
			<script>
                function showValues() {
                  var str = $("form").serialize();
                  $("#results").text(str);
                }
                $("select").change(showValues);
                showValues();
            </script>
        </body>
    </div>
	<footer>
		Copyright M. Robinson's Kitchen
	</footer>
</html>
