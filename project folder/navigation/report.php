<?php
	//aquiring connection file
    require_once"../conn.php";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<center>
			<div class="t">
				<h2>Employees Details</h2>
				<table name="rep">
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Rank</th>
						<th>Address</th>
						<th>Date of join</th>				<!--The heading of the table-->
						<th>Payment per Hour</th>
						<th>Hours worked</th>
						<th>Overtime</th>
						<th>Total payment</th>
						<th>Operation</th>
					</tr>
					<?php
						$go = $conn -> query("SELECT * FROM employee "); //query for getting all emplooyees infromations
						while ($row = $go->fetch(PDO :: FETCH_ASSOC))
						{
					?>
							<tr>
								<td> <?php echo $row['eid'] ?></td>
								<td> <?php echo $row['ename'] ?></td>
								<td> <?php echo $row['rank'] ?></td>
								<td> <?php echo $row['address'] ?></td>
								<td> <?php echo $row['date'] ?></td>
								<td> <?php echo $row['hourlypay'] ?> $</td>
								<td> <?php echo $row['HoursWorked'] ?></td>
								<td> <?php echo $row['overtime'] ?></td>
								<td> <?php echo $row['hourlypay'] * ( $row['HoursWorked'] + $row['overtime'] )?> $</td> <!--showing the total payment by multiblying payment per hour by the sum of worked hours and overtime-->
								<td>
									<form method="post">
										<?php echo('
											<button Style="">
												<a href="update.php?eid='.htmlentities($row['eid']).'" style="text-decoration: none; color: white; target=\"iframe\"; "> Edit </a> 
											</button>
											<button style="float:left">
												<a href="delete.php?eid='.htmlentities($row['eid']).'" style="text-decoration: none;color: white;  target=\"iframe\";  ">Delete</a>
											</button>');  //the hyper reference of the link is set to webpage link edited to point to the ID witch is stored with a get method form
										?>
									</form>
								</td>
							</tr>
				<?php	} ?>    
					<tr>
						<td colspan="8">
							Total payment for all employees
						</td>
						<td colspan="" style=" background-color: rgb(73,130,221); border-radius:5px; ">
							<?php //the query will sum the total payment for each employee and store it in a variable the show
								$go = $conn -> query("SELECT sum(hourlypay *(HoursWorked + overtime)) FROM employee");
								while($row = $go->fetch(PDO::FETCH_ASSOC))
								{
									foreach($row as $key => $value)
									{
										echo $value.' $'; //the variable is displayed in the table
									}
								}
							?>
						</td>
					</tr>
					<tr>
						<td colspan="8">
							The average payment for all employees
						</td>
						<td colspan="" style=" background-color: rgb(73,130,221); border-radius:5px;">
							<?php //hte query will calculate the average of total payment for each employee and store it in a variable
								$go = $conn -> query("SELECT Avg(hourlypay *(HoursWorked + overtime)) FROM employee");
								while($row = $go->fetch(PDO::FETCH_ASSOC))
								{
									foreach($row as $key => $value)
									{
										echo round($value,2).' $'; //the variable is round to 2 dicimal numbers and displayed in the table
									}
								}
							?>
						</td>
					</tr>
				</table>
			</div>
		</center>
	</body>
</html>