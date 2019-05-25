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
					<!--
					<a href="addCerti.php"><button class="btn btn-primary hover" id="off_btn">Generate Certificate</button></a>
					<a href="certi1.php"><button class="btn btn-primary hover" id="off_btn">List of Certificates</button></a>
					-->
					<hr>
				</div>

				<div id="checkInfo"></div>

				<div class="row">
					<div class="col-md-6">
						
						<form method="post" action="genCerti.php" id="genCerti">

						<div id="forUp">
							<input type="hidden" id="inputUpdate" name="id" value="0">
						</div>

							<div class="row" id="frmInputs">
							<?php
							include("frmInputs.php");
							?>
							</div>	

							<hr>

							<span class="btn btn-primary hover" id="genCer_btn">Generate</span>		
						</form>
					</div>
					<div class="col-md-6">
					
					<div id="resident_result">
						
					</div>
					
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#fname").on("keyup", function(){
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	
	$("#resident_result").load("resident_result.php?fname="+fname+"&lname="+lname);
});
$("#lname").on("keyup", function(){
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	
	$("#resident_result").load("resident_result.php?fname="+fname+"&lname="+lname);
});
</script>
<div class="modal" id="updateModal">
	<div class="modal-content animate" style="background-color: #fff; background-position: center; background-blend-mode: darken;">
		<div class="text-right border close-nav">
			<span class="glyphicon glyphicon-remove font-red hover btn-close cancel" id=""></span>
		</div>

		<div class="row">
            <div class="alert alert-danger">
              <b>Alert:</b> <span class="res_name"></span> is Already Existing! The System will overwrite all of <span id="pro"></span> information. Click <b>"Next"</b> to Continue.
            </div>

            <hr>

            <div class="text-right">
            	<span id="next" class="btn btn-primary">Next</span>
            	<span id="" class="btn btn-danger cancel">Cancel</span>
            </div>
		</div>
	</div>
</div>

<?php 
if(isset($_GET['certi'])){
$type = $_GET['certi'];
	if($type == "Indigency"){
		$show = "style='display: block!important;'";
		$id = $_GET['id'];
	}else{
		$show2 = "style='display: block!important;'";
		$id = $_GET['id'];
	}
}else{
	$show = "";
	$show2 = "";
	$id = "";
}
?>
<div class="modal" id="certificate" <?php echo $show; ?>>
	<div class="modal-content animate" style="background-color: #fff; background-position: center; background-blend-mode: darken; width: 60%; padding-left: 8%; padding-right: 8%">
		<div class="text-right border close-nav" style="padding: 0%">
			<span class="glyphicon glyphicon-remove font-red hover btn-close cancel" id=""></span>
		</div>

		<img src="img/silay.png" style="margin-bottom: -130px; height: 130px">

		<div class="row">
            <div class="text-center">
            Republic of the Philippines<br>
            Province of Negros Occidental<br>
            City of Silay<br>
            Barangay IV<br><br><br>

            <b>
            	OFFICE OF THE PUNONG BARANGAY<br><br><br>
	            <span style="font-size: 1.25em">
	            	CERTIFICATE OF INDIGENCY
	            </span>
	        </b>
            </div>

            <b>
            	To Whom It May Concern:
            </b>
            <br><br><br>
<?php
$sql = mysqli_query($conn, "SELECT * FROM certificate WHERE cer_id = '$id'");
$row = mysqli_fetch_array($sql);

if($row['cMname'] == ""){
	$initial = "";
}else{
	$initial = substr($row['cMname'], 0, 1).". ";
}
if($row['cGender'] == 'Male'){
	$add = "Mr. ";
}else{
	$add = 'Ms. ';
}
?>
            <div class="" style="text-indent: 5%">
	            This is to certificy that <u>&nbsp;&nbsp; <?php echo $row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;&nbsp;</u>, <u> &nbsp; <?php echo $row['cAge']; ?> &nbsp; </u> years old, a bonafide resident of <u> &nbsp;&nbsp; <?php echo $row['cAddress'] ?> &nbsp;&nbsp; </u>, Barangay Hawaiian is an indigentof this Barangay and he did not avail financial assistance from the Barangay.<br><br>
            </div>
            <div class="" style="text-indent: 5%">
	            This certification is issued upon the request of <u> &nbsp;&nbsp; <?php echo $add.$row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;&nbsp; </u> for whatever legal/lawful purpose it may serve best.<br><br><br>
            </div>
            <div class="" style="text-indent: 5%">
	            Issued this <u> &nbsp;&nbsp; <?php echo date('jS', strtotime($row['cDate'])); ?> &nbsp;&nbsp; </u> day of <u> &nbsp;&nbsp; <?php echo date('F', strtotime($row['cDate'])); ?> &nbsp;&nbsp; </u>, <?php echo date('Y', strtotime($row['cDate'])); ?> at Barangay IV, Silay City, Negros Occidental, Philippines.
            </div>

            <div style="margin-left: 50%; margin-top: 12%">
            	<b>HENRY C. BEZELLA</b><br>
            	Punong Barangay
            </div>

            <div style="margin-top: 10%; display: inline-block;">
            	<b>Noted By:</b><br><br>
            	<u>&nbsp; <?php echo $row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;</u><br>
            	<div class="text-center">
            		<b>BHW</b>
            	</div>
            </div>
            <hr>

            <div class="text-right">
            	<span id="next" class="btn btn-primary">Print Certificate</span>
            </div>
		</div>
	</div>
</div>

<div class="modal" id="certificate2" <?php echo $show2; ?>>
	<div class="modal-content animate" style="background-color: #fff; background-position: center; background-blend-mode: darken; width: 60%; padding-left: 8%; padding-right: 8%">
		<div class="text-right border close-nav" style="padding: 0%">
			<span class="glyphicon glyphicon-remove font-red hover btn-close cancel" id=""></span>
		</div>

		<img src="img/silay.png" style="margin-bottom: -130px; height: 130px">

		<div class="row">
            <div class="text-center">
            Republic of the Philippines<br>
            Province of Negros Occidental<br>
            City of Silay<br>
            Barangay IV<br><br><br>

            <b>
            	OFFICE OF THE PUNONG BARANGAY<br><br><br>
	            <span style="font-size: 1.25em">
	            	BARANGAY CERTIFICATE
	            </span>
	        </b>
            </div>

            <b>
            	To Whom It May Concern:
            </b>
            <br><br><br>
<?php
$sql = mysqli_query($conn, "SELECT * FROM certificate WHERE cer_id = '$id'");
$row = mysqli_fetch_array($sql);

if($row['cMname'] == ""){
	$initial = "";
}else{
	$initial = substr($row['cMname'], 0, 1).". ";
}
if($row['cGender'] == 'Male'){
	$add = "Mr. ";
}else{
	$add = 'Ms. ';
}
?>
            <div class="" style="text-indent: 5%">
	            This is to certificy that <u>&nbsp;&nbsp; <?php echo $row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;&nbsp;</u>, <u> &nbsp; <?php echo $row['cAge']; ?> &nbsp; </u> years old, a bonafide resident of <u> &nbsp;&nbsp; <?php echo $row['cAddress'] ?> &nbsp;&nbsp; </u>, Barangay Hawaiian is an indigentof this Barangay and he did not avail financial assistance from the Barangay.<br><br>
            </div>
            <div class="" style="text-indent: 5%">
	            This certification is issued upon the request of <u> &nbsp;&nbsp; <?php echo $add.$row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;&nbsp; </u> for whatever legal/lawful purpose it may serve best.<br><br><br>
            </div>
            <div class="" style="text-indent: 5%">
	            Issued this <u> &nbsp;&nbsp; <?php echo date('jS', strtotime($row['cDate'])); ?> &nbsp;&nbsp; </u> day of <u> &nbsp;&nbsp; <?php echo date('F', strtotime($row['cDate'])); ?> &nbsp;&nbsp; </u>, <?php echo date('Y', strtotime($row['cDate'])); ?> at Barangay IV, Silay City, Negros Occidental, Philippines.
            </div>

            <div style="margin-left: 50%; margin-top: 12%">
            	<b>HENRY C. BEZELLA</b><br>
            	Punong Barangay
            </div>

            <div style="margin-top: 10%; display: inline-block;">
            	<b>Noted By:</b><br><br>
            	<u>&nbsp; <?php echo $row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;</u><br>
            	<div class="text-center">
            		<b>BHW</b>
            	</div>
            </div>
            <hr>

            <div class="text-right">
            	<span id="next" class="btn btn-primary">Print Certificate</span>
            </div>
		</div>
	</div>
</div>

</body>
<script type="text/javascript">
$("#genCer_btn").click(function(){
	$.ajax({
        type: 'POST',
        url: 'checkInfo.php',
        data: {fname: $("#fname").val(), lname: $("#lname").val(), gender: $("#gender").val()},

        success: function (response) {
        	$("#checkInfo").html(response);
            }
    });

	//$("#checkInfo").load("checkInfo.php?fname="+$("#fname").val()+"&lname="+$("#lname").val());
});

$(".cancel").click(function(){
	$("#updateModal").hide();
	$("#certificate").hide();
	$("#certificate2").hide();
});
$("#next").click(function(){
	$("#genCerti").submit();
});
</script>

<?php
include("footer.php");
?>