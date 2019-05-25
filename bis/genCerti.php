<?php
include("db/db.php");

$id = "";
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$type = $_POST['type'];

$id = $_POST['id'];


mysqli_query($conn, "INSERT INTO certificate(cFname, cMname, cLname, cAge, cGender, purok_id, cDate, cTime, category) VALUES('$fname', '$mname', '$lname', '$age', '$gender', '$address', NOW(), NOW(), '$type')");

	$id2 = mysqli_insert_id($conn);
if($id == 0){
	mysqli_query($conn, "INSERT INTO resident(rFname, rMname, rLname, rAge, rGender, purok_id) VALUES('$fname', '$mname', '$lname', '$age', '$gender', '$address')");

}else{
	mysqli_query($conn,"UPDATE resident SET rFname = '$fname', rMname = '$mname', rLname = '$lname', rAge='$age', purok_id = '$address' WHERE res_id = '$id'");
}

	echo "<script>document.location='addCerti.php?certi=$type&id=$id2'</script>";

?>