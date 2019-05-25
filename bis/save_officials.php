<?php
include("db/db.php");


$sql = mysqli_query($conn, "SELECT * FROM position WHERE pos_id < 17");
	while ($row = mysqli_fetch_array($sql)) {

if($_POST['pos'.$row['pos_id']] <> ""){
$name = $_POST['pos'.$row['pos_id']];
$pos_id = $_POST[$row['pos_id']];
$year = $_POST['year'];

mysqli_query($conn, "INSERT INTO brgy_official(off_name, pos_id, off_year) VALUES('$name', '$pos_id', '$year')");
}
	
}

echo "<script>document.location='officials.php'</script>";
?>