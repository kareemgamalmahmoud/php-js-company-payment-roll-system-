<?php
	//requiring connection file
    require_once"../conn.php";
?>

<html>
    <head>
        <title> Company Payroll System </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            body{
                background-image: url(111.jpg);
                margin: 0 ;
                padding: 0;
                font-family: sans-serif;
                background-repeat: round;
                background-size: cover;
                }
        </style>
    </head>
	<body>
		<!--the navagation bar that will let the user to do operations-->
		<nav class="menu">
			<ul>
				<li><a href="navigation/home.php" target="iframe">Home</a></li>
				<li><a href="navigation/form.php" target="iframe">Add Employee</a></li>
				<li><a href="navigation/report.php" target="iframe">Report</a></li>
				<li><a href="navigation/search.php" target="iframe">Search by id</a></li>
				<li><a href="Documentation.htm" target="iframe">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Documentation</a></li>
				<li style="float:right; font-family:Brush Script MT; color:lightcyan; font-size:150%;">
					<span style="text-decoration:underline crimson;">Kareem Gamal</span>
					<span style="color:crimson;"> & </span>
					<span style="text-decoration:underline crimson; padding-right:10px;">Ahmed Saeed</span>
				</li>
			</ul>
		</nav>
		<!--the iframe that woll show the content of the webpages according to the navegation bar-->
		<iframe frameborder="0" name="iframe" width="99.8%" height="93.2%" src="navigation/home.php"></iframe>
	</body>    
</html>