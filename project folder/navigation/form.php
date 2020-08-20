
<?php
	//requiring connection file
    require_once"../conn.php";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css"> <!--linking style sheet file-->
	</head>
	<body>
		<center>
			<div class="box">
				<h2>Employee's informations</h2>
				<form method="post" > <!--starting a form with post method-->
				
					<div class="inputBox">
						<input type="text" name="ename" id="ename" required> <!--the input for empolyee name-->
						<label>Name</label>
					</div>
					
					<div class="inputBox" >
						<input type="number" name="eid" id="eid" required> <!--input for employee's ID-->
						<label>ID</label>
					</div>
					
					<div class="inputBox">
						<input type="text" name="address" id="address" required> <!--input for employee's address-->
						<label>Address</label>
					</div>
					
					<div class="inputBox">
						<input type="text" name="rank" id="rank" required> <!--input for employee's rnak-->
						<label>Rank</label>
					</div>
					
					<div class="inputBox">
						<input type="text" name="hourlypay" id="hourlypay" required> <!--input for employee's payment per hour-->
						<label>Payment per Hour</label>
					</div>
					
					<div class="inputBox">
						<input type="text" name="HW" id="HW" required> <!--input for employee's number of worked hours-->
						<label>Hours worked</label>
					</div>
					
					<div class="inputBox">
						<input type="text" name="OT" id="OT" required> <!--input for employee's overtime hours-->
						<label>Overtime</label>
					</div>
					
					<div class="inputBox">
						<input type="date" name="date" id="date" > <!--input for appointment date-->
						<label>Date of appointment in the company</label> 
					</div>
					
					<input type="submit" name="submit" value="Submit"> <!--the button that will triger the php statments-->
					<p id="success" style="color:green;">  </p>
					
				</form>
				
			</div>
		</center>
		<?php
			if(isset($_POST['submit'])) //if the user clicks the submit button
			{
				//stores values that the user inserted in the form in variables
				$ename = $_POST['ename']; 
				$eid = $_POST['eid'];
				$address = $_POST['address'];
				$rank = $_POST['rank'];            
				$HP = $_POST['hourlypay'];
				$workhours = $_POST['HW'];
				$overtime = $_POST['OT'];
				$date = $_POST['date'];
				$conn -> exec("INSERT INTO employee(ename, eid, rank, address, hourlypay, date, HoursWorked, overtime) VALUES ('$ename', '$eid', '$rank', '$address', '$HP','$date', '$workhours', '$overtime')"); //the query that will insert the values in the database system
				
				echo '<script language="javascript">';
				echo 'alert("Employee Added Successfully!")';   //an alert window that will inform the user that the information successfully inserted
				echo '</script>';
			}
			
			
				
			
		?>
	</body>
</html>


