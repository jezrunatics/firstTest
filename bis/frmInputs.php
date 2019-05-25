<?php
include("db/db.php");

	$fname = "";
	$mname = "";
	$lname = "";
	$age = "";
	$address = "";
	$gender = "";
	
if(isset($_GET['id'])){
$id = $_GET['id'];

	$sql = mysqli_query($conn, "SELECT * FROM resident NATURAL JOIN purok WHERE res_id = '$id'");

	if(mysqli_num_rows($sql) > 0){
		while($row = mysqli_fetch_array($sql)){
			$fname = $row['rFname'];
			$mname = $row['rMname'];
			$lname = $row['rLname'];
			$age = $row['rAge'];
			$gender = $row['rGender'];
			$address = $row['purok_id'];
		}
	}else{
		$fname = "";
		$mname = "";
		$lname = "";
		$age = "";
		$address = "";
		$gender = "";
	}
}
?>
								<div class="col-md-4" style="padding-right: 0px">
									<input type="text" name="fname" class="input-form pad5p" placeholder="First Name" id="fname" value="<?php echo $fname ?>" required>
								</div>
								<div class="col-md-4">
									<input type="text" name="mname" class="input-form pad5p" placeholder="Middle Name" value="<?php echo $mname ?>" required>
								</div>
								<div class="col-md-4" style="padding-left: 0px">
									<input type="text" name="lname" class="input-form pad5p" placeholder="Last Name" id="lname" value="<?php echo $lname ?>" required>
								</div>

								<div class="col-md-12">
									<input type="text" name="age" class="input-form mtop-10" placeholder="Age" value="<?php echo $age ?>" required>	
<?php
$selec1 = "";
$selec2 = "";
	if($gender == "Male"){
		$selec1 = "selected";
	}else{
		$selec2 = "selected";
	}
?>									
									<select name="gender" class="input-form mtop-10"  id="gender" required>
										<option disabled selected>Gender</option>
										<option <?php echo $selec1 ?>>Male</option>
										<option <?php echo $selec2 ?>>Female</option>
									</select>	
									<select name="address" class="input-form mtop-10" required>
										<option disabled selected>Purok</option>
<?php

	$sql = mysqli_query($conn, "SELECT * FROM purok");

		while($row = mysqli_fetch_array($sql)){

			if($row['purok_id'] == $address){
				$selected = "selected";
			}else{
				$selected = "";
			}
?>
										<option value="<?php echo $row['purok_id'] ?>" <?php echo $selected ?> ><?php echo $row['purok'] ?></option>
<?php
}
?>
									</select>
									<!-- this is dropdown -->
									<select name="type" class="input-form mtop-10" required>
										<option disabled selected>Category</option>
										<option>Indigency</option>
										<option>Barangay Clearance</option>
									</select>
									
								</div>