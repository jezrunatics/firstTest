<?php
include("header.php");
include("nav.php");
include("db/db.php");
?>
<body>
<div class="modal" id="off_modal">
	<div class="modal-content animate" style="background: url('img/user.png'); background-size: 50%; background-repeat: no-repeat; background-color: #fff; background-position: center; background-blend-mode: darken;">
		<div class="text-right border close-nav">
			<span class="glyphicon glyphicon-remove font-red hover btn-close" id=""></span>
		</div>
		<form method="post" action="save_officials.php">

			<div class="row">
				<div class="col-md-4" style="padding-right: 0px">
					<input type="text" name="fname" class="input-form pad5p" placeholder="First Name">
				</div>
				<div class="col-md-4">
					<input type="text" name="fname" class="input-form pad5p" placeholder="Middle Name">
				</div>
				<div class="col-md-4" style="padding-left: 0px">
					<input type="text" name="fname" class="input-form pad5p" placeholder="Last Name">
				</div>
			</div>
			<select name="" class="input-form mtop-10">
				<option>Brgy Captain</option>
				<option>Brgy Kagawad</option>
			</select>			

			<input type="text" name="fname" class="input-form mtop-10" placeholder="Gender">	
			<input type="text" name="fname" class="input-form mtop-10" placeholder="Age">
			<input type="text" name="fname" class="input-form mtop-10" placeholder="Contact no.">	
			<input type="text" name="fname" class="input-form mtop-10" placeholder="Address">		
		</form>
	</div>
</div>

<div class="modal" id="off_modal_BOSP">
	<div class="modal-content animate" style="background-size: 50%; background-repeat: no-repeat; background-color: #fff; background-position: center; background-blend-mode: darken; width: 60%">
		<div class="text-right border close-nav">
			<span class="glyphicon glyphicon-remove font-red hover btn-close" id="off_close"></span>
		</div>
		<form method="post" action="save_officials.php" enctype="multipart/form-data">

		<select name="year" class="input-form mbot-10" required>
			<option>2017</option>
			<option>2018</option>
			<option>2019</option>
			<option>2020</option>
			<option>2021</option>
		</select>
			<table class="table table-condensed">
<?php
$sql = mysqli_query($conn, "SELECT * FROM position WHERE pos_id < 17");
	while ($row = mysqli_fetch_array($sql)) {
?>		
			<tr>
				<td style="vertical-align: middle;">
					<label><?php echo $row['position'] ?></label>
				</td>		
				<td style="vertical-align: middle;">
					<input type="text" name="pos<?php echo $row['pos_id'] ?>" class="input-form" placeholder="Full Name">
					<input type="hidden" name="<?php echo $row['pos_id'] ?>" class="input-form" value="<?php echo $row['pos_id'] ?>">
				</td>			
				<td style="vertical-align: middle;">
					<input type="file" name="image<?php echo $row['pos_id'] ?>" class="input-form">
				</td>		
			</tr>
<?php
	}
?>
			</table>
<input type="submit" name="">
		</form>
	</div>
</div>

<div class="border col-md-10 col-md-push-1">
<div class="row">
<?php
include("nav2.php");
?>
</div>
</div>
<div class="border col-md-10 col-md-push-1">
	<div>

		<div class="row mtop-10">
			<div class="col-md-12 text-center">

		<h2>BARANGAY OFFICIAL, STAFF AND PERSONNEL</h2>

<?php
	$sql = mysqli_query($conn, "SELECT * FROM brgy_official NATURAL JOIN position WHERE pos_id = '1' ORDER BY off_id desc");

		$row = mysqli_fetch_array($sql);

			if(mysqli_num_rows($sql) == 0){
				$offname = "Name: N/A";
			}else{
				$offname = $row['off_name'];
			}
?>
				<div class="off_box">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						<?php echo $offname ?>
						<div style="font-size: .8em">
							<?php echo $row['position']; ?>
						</div>
					</div>
				</div>
<?php

?>

			</div>
			<div class="col-md-10" style="margin-left: 111px">

<?php
	$sql = mysqli_query($conn, "SELECT * FROM position WHERE pos_id > '1' AND pos_id < '9'");

		while($row = mysqli_fetch_array($sql)){

			$pos = $row['pos_id'];

		$sql2 = mysqli_query($conn, "SELECT * FROM brgy_official WHERE pos_id = '$pos'");

			$row2 = mysqli_fetch_array($sql2);

			if(mysqli_num_rows($sql2) == 0){
				$off2name = "Name: N/A";
			}else{
				$off2name = $row2['off_name'];
			}
?>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						<?php echo $off2name ?>
						<div style="font-size: .8em">
							<?php echo $row['position']; ?>
						</div>
					</div>
				</div>
<?php
		}
?>					
			</div>
			<div class="col-md-11" style="margin-left: 48px">

<?php
	$sql = mysqli_query($conn, "SELECT * FROM position WHERE pos_id > '8' AND pos_id < '17'");

		while($row = mysqli_fetch_array($sql)){

			$pos = $row['pos_id'];

		$sql2 = mysqli_query($conn, "SELECT * FROM brgy_official WHERE pos_id = '$pos'");

			$row2 = mysqli_fetch_array($sql2);

			if(mysqli_num_rows($sql2) == 0){
				$off2name = "Name: N/A";
			}else{
				$off2name = $row2['off_name'];
			}
?>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						<?php echo $off2name ?>
						<div style="font-size: .8em">
							<?php echo $row['position']; ?>
						</div>
					</div>
				</div>
<?php
		}
?>				
			</div>


			<div class="col-md-12 text-right mtop-10">
				<button class="btn btn-primary" id="btn_BOSP"> UPDATE CHART</button><hr>
			</div>
		</div>

		<!--
		<div class="row mtop-10">
			<div class="col-md-12 text-center">

		<h2>BARANGAY HEALTH CENTER STAFF</h2>

				<div class="off_box">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5" style="margin-left: 357.5px">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7" style="margin-left: 232px">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-12 text-right mtop-10">
				<button class="btn btn-primary" id="btn_BOSP"> UPDATE CHART</button><hr>
			</div>
		</div>

		<div class="row mtop-10">
			<div class="col-md-12 text-center">

			<h2>BARANGAY LUPON</h2>
			</div>
			<div class="col-md-7" style="margin-left: 237px">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7" style="margin-left: 237px">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-12 text-right mtop-10">
				<button class="btn btn-primary" id="btn_BOSP"> UPDATE CHART</button><hr>
			</div>
		</div>

		<div class="row mtop-10">
			<div class="col-md-12 text-center">

			<h2>BARANGAY TANOD</h2>
			</div>
			<div class="col-md-7" style="margin-left: 237px">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7" style="margin-left: 237px">
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2" style="border: none">
				</div>
				<div class="off_box2" style="border: none">
				</div>
			</div>
			<div class="col-md-12 border">
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
				<div class="off_box2">
					<img src="img/user.png" class="img-responsive ">
					<div class="text-center mtop-5">
						asdasd
						<div style="font-size: .8em">
							asfasf asdas sad asda  asdasd  asdd
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-12 text-right mtop-10">
				<button class="btn btn-primary" id="btn_BOSP"> UPDATE CHART</button><hr>
			</div>
		</div>
		-->

		<!--
		<div class="row">
			<div class=" panel-body" style="">
				<div class="text-right">
					<button class="btn btn-primary hover" id="off_btn">Add New Official</button>
					<hr>
				</div>
				<table class="table table-striped">
					<tr class="text-center">
						<td class="border">Offcial</td>
						<td class="border">Position</td>
						<td class="border">Gender</td>
						<td class="border">Age</td>
						<td class="border">Contact no.</td>
						<td class="border">Address</td>
					</tr>
<?php
	$sql = mysqli_query($conn, "SELECT * FROM brgy_official");

		while($row = mysqli_fetch_array($sql)){
			$id = $row['off_id'];
			$fname = $row['off_fname'];
			$mname = $row['off_mname'];
			$lname = $row['off_lname'];
			$position = $row['off_position'];
			$gender = $row['off_gender'];
			$age = $row['off_age'];
			$address = $row['address'];
			$contact_no = $row['contact_no'];
?>
					<tr class="text-center">
						<td class="border"><?php echo $fname." ".$mname." ".$lname ?></td>
						<td class="border"><?php echo $position ?></td>
						<td class="border"><?php echo $gender ?></td>
						<td class="border"><?php echo $age ?></td>
						<td class="border"><?php echo $contact_no ?></td>
						<td class="border text-left"><?php echo $address ?></td>
					</tr>
<?php
		}
?>
				</table>
			</div>
		</div>

		-->
	</div>
</div>
</body>
<script type="text/javascript">
$("#off_btn").click(function(){
	$("#off_modal").show();
});
$(".btn-close").click(function(){
	$("#off_modal").hide();
	$("#off_modal_BOSP").hide();
});
$("#btn_BOSP").click(function(){
	$("#off_modal_BOSP").show();
});
</script>
<?php
include("footer.php");
?>