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
				<div class="text-right">
					<a href="addCerti.php"><button class="btn btn-primary hover" id="off_btn">Generate Certificate</button></a>
					<!--
					<a href="certi1.php"><button class="btn btn-primary hover" id="off_btn">List of Certificates</button></a>
					-->
					<hr>
				</div>
				<table class="table table-striped">
					<tr class="text-center">
						<td class="border">Name</td>
						<td class="border">Age</td>
						<td class="border">Gender</td>
						<td class="border">Purok</td>
						<td class="border">Date</td>
						<td class="border">Time</td>
						<td class="border">Category</td>
						<td class="border"></td>
					</tr>
<?php
	$sql = mysqli_query($conn, "SELECT * FROM certificate NATURAL JOIN purok");

		while($row = mysqli_fetch_array($sql)){
			$id = $row['cer_id'];
			$fname = $row['cFname'];
			$mname = $row['cMname'];
			$lname = $row['cLname'];
			$age = $row['cAge'];
			$gender = $row['cGender'];
			$purok = $row['purok'];
			$date = $row['cDate'];
			$time = $row['cTime'];
			$type = $row['category'];
?>
					<tr class="text-center">
						<td class="border"><?php echo $fname." ".$mname." ".$lname ?></td>
						<td class="border"><?php echo $age ?></td>
						<td class="border"><?php echo $gender ?></td>
						<td class="border text-left"><?php echo $purok ?></td>
						<td class="border"><?php echo date("F d, Y", strtotime($date)) ?></td>
						<td class="border"><?php echo date("h:i A", strtotime($time)) ?></td>
						<td class="border"><?php echo $type ?></td>
						<td class="border hover viewCerti" style="width: 50px" id="<?php echo $row['cer_id']; ?>">
							<span class="glyphicon glyphicon-file" style="font-size: 1.5em; color: #1f9cdd"></span>
							<span class="glyphicon glyphicon-search" style="margin-left: -15px; color: #225f93"></span>
						</td>
					</tr>
<?php
		}
?>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal" id="certificate">
	<div class="modal-content animate" style="background-color: #fff; background-position: center; background-blend-mode: darken; width: 60%; padding-left: 8%; padding-right: 8%">
		<div class="text-right border close-nav" style="padding: 0%">
			<span class="glyphicon glyphicon-remove font-red hover btn-close cancel" id=""></span>
		</div>

		<div class="row" id="content">
		</div>
	</div>
</div>

</body>

<script type="text/javascript">
$(".viewCerti").click(function(){
	$("#certificate").show();
	$("#content").load("viewCerti.php?id="+this.id);
});
$(".cancel").click(function(){
	$("#certificate").hide();
});
</script>
<?php
include("footer.php");
?>