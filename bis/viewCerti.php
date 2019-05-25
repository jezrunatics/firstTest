<?php 
include("db/db.php");

$id = $_GET['id'];
?>
            <img src="img/silay.png" style="margin-bottom: -130px; height: 130px">
<?php
$sql = mysqli_query($conn, "SELECT * FROM certificate NATURAL JOIN purok WHERE cer_id = '$id'");
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

if($row['category'] == 'Indigency'){
      $caption = "CERTIFICATE OF INDIGENCY";
}else{
      $caption = "BARANGAY CLEARANCE";
}
?>            
            <div class="text-center">
            Republic of the Philippines<br>
            Province of Negros Occidental<br>
            City of Silay<br>
            Barangray IV<br><br><br>

            <b>
            	OFFICE OF THE PUNONG BARANGAY<br><br><br>
	            <span style="font-size: 1.25em">
	            	<?php echo $caption ?>
	            </span>
	        </b>
            </div>

            <b>
            	To Whom It May Concern:
            </b>
            <br><br><br>

            <div class="" style="text-indent: 5%">
	            This is to certificy that <u>&nbsp;&nbsp; <?php echo $row['cFname']." ".$initial. $row['cLname']; ?> &nbsp;&nbsp;</u>, <u> &nbsp; <?php echo $row['cAge']; ?> &nbsp; </u> years old, a bonafide resident of <u> &nbsp;&nbsp; <?php echo $row['purok'] ?> &nbsp;&nbsp; </u>, Barangay IV is an indigentof this Barangay and he did not avail financial assistance from the Barangay.<br><br>
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
