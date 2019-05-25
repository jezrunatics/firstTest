<?php
include("db/db.php");
$fname = $_GET['fname'];
$lname = $_GET['lname'];

$sql = mysqli_query($conn, "SELECT * FROM resident WHERE rFname LIKE '%$fname%' AND rLname LIKE '%$lname%'");
?>
<table class="table table-striped">
	<tr class="text-center">
		<td class="border">Name</td>
		<td class="border">Gender</td>
		<td class="border">Action</td>
	</tr>
<?php
while($row = mysqli_fetch_array($sql)){
?><tr>
		<td class="border"><?php echo $row['rFname'] ." ". $row['rLname'] ?></td>
		<td class="text-center border"><?php echo $row['rGender']; ?></td>
		<td class="text-center border"><span class="names" id="<?php echo $row['res_id'] ?>"><i class="hover">Select</i></span></td>
	</tr>
<?php
//	echo "Name: ".$row['rFname'] ." ". $row['rLname'] ." - ". $row['rGender'];

}

?>
	</table>
<script>
$(".names").click(function(){
	var id2 = this.id;
	
	$("#frmInputs").load("frmInputs.php?id="+id2);
});
</script>