<?php
    require_once"../conn.php";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<center>
			<table>
				<tr>
					<td>
						<div class="box">
							<h2>Search</h2>
							<p style="color: aliceblue">Enter id of employee you want to display his data </p>
							<form method="post">
								<div class="inputBox">
									<input type="number" name="id" id="id" required> <!--input to take ID form the user-->
									<label>Employee ID</label>
								</div>
								<center><input type="submit" name="search" value=" Search " ></center> <!--button that will triger php code-->
								<p id="error" style="color:red;"> </p> <!--Empty paragraph that will tell the user if the ID is not valid-->
							</form>
						</div>
					</td>
				</tr>
			</table>
			<br><br>
			<?php
				if(isset($_POST['search'])) //if the user presses the search button
				{
					$eid = $_POST['id']; //storing the id in a variable
					$go = $conn -> query("SELECT * FROM employee WHERE eid = '$eid'"); //query that will search for the emplooyee
					$row = $go->FETCH(PDO :: FETCH_ASSOC) ;
					if($row['eid'] == $eid) { //checking that the ID is found and is equal to the ID enterd by user if not the table won't appear
			?>
						<div class="t">
							<h2>
								Employee Details
							</h2>
							<table name="rep">
								<tr>
									<th>Employee ID</th>
									<th>Name</th>
									<th>Rank</th>
									<th>Address</th>
									<th>Date of join</th>
									<th>Payment per Hour</th>
									<th>Hours worked</th>
									<th>Overtime</th>
								</tr>
								<tr>
									<td> <?php echo $row['eid'] ?></td>
									<td> <?php echo $row['ename'] ?></td>
									<td> <?php echo $row['rank'] ?></td>
									<td> <?php echo $row['address'] ?></td>
									<td> <?php echo $row['date'] ?></td>
									<td> <?php echo $row['hourlypay'] ?></td>
									<td> <?php echo $row['HoursWorked']?></td>
									<td> <?php echo $row['overtime']?></td>
								</tr>
							</table>
						</div>
						<?php  echo '<script type="text/javascript"> document.getElementById("error").innerHTML = " "</script>' ; //making the error paragraph empty again incase the user enters another valid value
					} 
					else echo '<script type="text/javascript"> document.getElementById("error").innerHTML = "ID not found !"</script>' ; //the script that will show the error massege
				}		?>    
		</center>
	</body>
</html>

