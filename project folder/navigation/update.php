
<?php
    require_once"../conn.php";
?>

<?php
	session_start();
	if ( isset($_POST['submit']) ) { 
		$sql = "UPDATE employee SET ename = :ename, eid = :eid, address = :address , rank = :rank , hourlypay = :hourlypay , date = :date , HoursWorked = :HoursWorked , overtime = :overtime WHERE eid = :eid";
		$stmt = $conn ->prepare($sql);
		$stmt -> execute( array( ':ename' => $_POST['ename'], ':eid' => $_POST['eid'], ':address' => $_POST['address'], ':rank' => $_POST['rank'], ':hourlypay' => $_POST['hourlypay'], ':date' => $_POST['date'], 'HoursWorked' => $_POST['HoursWorked'], 'overtime' => $_POST['overtime']) ) ;

		$_SESSION['success'] = 'Record updated';
		header( 'Location: report.php' ) ;
		return;
	}
	$go = $conn->prepare("SELECT * FROM employee where eid = :xyz");
	$go->execute(array(":xyz" => $_GET['eid']));
	$row = $go->fetch(PDO::FETCH_ASSOC);

	if ( $row === false ) {
		$_SESSION['error'] = 'Bad value for id';
		header( 'Location: report.php' ) ;
		return;
	}

	$ename = htmlentities($row['ename']);
	$eid = htmlentities($row['eid']);
	$address = htmlentities($row['address']);
	$rank = htmlentities($row['rank']);
	$hourlypay = htmlentities($row['hourlypay']);
	$HoursWorked = htmlentities($row['HoursWorked']);
	$overtime = htmlentities($row['overtime']);
	$date = htmlentities($row['date']);
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
							<h2>Enter new data for employee, <?php echo $ename?></h2>
							<form method="post" >
								<div class="inputBox">
									<input type="text" name="ename" id="ename" value="<?php echo "$ename"; ?>" required> <!--input for new employee name-->
									<label>Name</label>
								</div>
								<div class="inputBox" >
									<input type="number" name="eid" id="eid" value="<?php echo"$eid"; ?>" required> <!--input for new employee ID-->
									<label>ID</label>
								</div>
								<div class="inputBox">
									<input type="text" name="address" id="address" value="<?php echo"$address"; ?>" required> <!--input for new employee address-->
									<label>Address</label>
								</div>
								<div class="inputBox">
									<input type="text" name="rank" id="rank" value="<?php echo"$rank"; ?>" required> <!--input for new employee rank-->
									<label>Rank</label>
								</div>
								<div class="inputBox">
									<input type="text" name="hourlypay" id="hourlypay" value="<?php echo"$hourlypay"; ?>" required> <!--input for new employee payment per hour-->
									<label>Payment per Hour</label>
								</div>
								<div class="inputBox">
									<input type="text" name="HoursWorked" id="HoursWorked" value="<?php echo"$HoursWorked"; ?>" required> <!--input for new employee worked hours-->
									<label>Hours Worked</label>
								</div>	
								<div class="inputBox">
									<input type="text" name="overtime" id="overtime" value="<?php echo"$overtime"; ?>" required> <!--input for new employee overtime-->
									<label>Overtime</label>
								</div>
								<div class="inputBox">
									<input type="date" name="date" id="date" value="<?php echo"$date"; ?>" required> <!--input for new employee date-->
									<label>Date of appointment in the company</label>
								</div>
								<input type="submit" name="submit" value="Update" onclick="">
							</form>   
						</div>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>