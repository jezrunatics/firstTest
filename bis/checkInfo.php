<?php
include("db/db.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];

	$sql = mysqli_query($conn, "SELECT * FROM resident WHERE rFname = '$fname' AND rLname = '$lname' AND rGender = '$gender'");

	//	echo mysqli_num_rows($sql);
	if(mysqli_num_rows($sql) > 0){

		$row = mysqli_fetch_array($sql);

		if($row['rGender'] == 'Male'){
			$pronoun = "his";
		}else{
			$pronoun = "her";
		}

?>
<script type="text/javascript">
	$(".res_name").text("<?php echo $row['rFname'].' '.$row['rLname']; ?>");
	$("#updateModal").show();
	$("#pro").text("<?php echo $pronoun ?>");
	$("#inputUpdate").val("<?php echo $row['res_id'] ?>");
</script>
<?php
	}else{
?>
<script type="text/javascript">
	$("#inputUpdate").val("0");
	$("#genCerti").submit();
</script>
<?php
	}
?>