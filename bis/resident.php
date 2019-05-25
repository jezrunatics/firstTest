<?php
include("header.php");
include("nav.php");
include("db/db.php");
?>
<body>

<div class="border col-md-10 col-md-push-1">
<div class="row">
<?php
include("nav2.php");
?>
</div>
</div>
<div class="border col-md-10 col-md-push-1">
	<div>
		
		<div class="row">
			<div class=" panel-body" style="">
				<table class="table table-striped">
					<tr class="text-center">
						<td class="border" colspan="4" style="background-color: #71a5c0; color: #fff">RESIDENTS</td>
					</tr>
					<tr class="text-center">
						<td class="border">Name</td>
						<td class="border">Age</td>
						<td class="border">Gender</td>
						<td class="border">Purok</td>
					</tr>
<?php
	$sql = mysqli_query($conn, "SELECT * FROM resident NATURAL JOIN purok");

		while($row = mysqli_fetch_array($sql)){
			$id = $row['res_id'];
			$fname = $row['rFname'];
			$mname = $row['rMname'];
			$lname = $row['rLname'];
			$age = $row['rAge'];
			$gender = $row['rGender'];
			$purok = $row['purok'];
?>
					<tr class="text-center">
						<td class="border"><?php echo $fname." ".$mname." ".$lname ?></td>
						<td class="border"><?php echo $age ?></td>
						<td class="border"><?php echo $gender ?></td>
						<td class="border text-left"><?php echo $purok ?></td>
					</tr>
<?php
		}
?>
				</table>
			</div>
		</div>
	</div>
</div>



</body>

<?php
include("footer.php");
?>