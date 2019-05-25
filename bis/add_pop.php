<?php
include("db/db.php");

$year = $_POST['year'];
$purok = $_POST['purok'];
$belowM = $_POST['belowM'];
$belowF = $_POST['belowF'];
$midM = $_POST['midM'];
$midF = $_POST['midF'];
$aboveM = $_POST['aboveM'];
$aboveF = $_POST['aboveF'];

$sql = mysqli_query($conn, "SELECT * FROM population NATURAL JOIN purok WHERE year = '$year' AND purok_id = '$purok'");
$row = mysqli_fetch_array($sql);

 $purok_name = $row['purok'];

if(mysqli_num_rows($sql) == 0){
mysqli_query($conn, "INSERT INTO population(year, purok_id, belowM, belowF, midM, midF, aboveM, aboveF) VALUES('$year','$purok','$belowM','$belowF','$midM','$midF','$aboveM','$aboveF')");

	echo "<script>alert('Successfully added records')</script>";
}else{
	echo "<script>alert('As for Purok $purok_name for $year, It has already have records.')</script>";
}
echo "<script>document.location='pop.php'</script>";
?>