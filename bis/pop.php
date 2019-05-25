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
					<hr>
				</div>

				<div id="checkInfo"></div>

				<div class="row">
					<div class="col-md-6">
						
						<form method="post" action="add_pop.php" id="genCerti">

						<div id="forUp">
							<input type="hidden" id="inputUpdate" name="id" value="0">
						</div>

							<div class="row">
								<div class="col-md-4 text-right">For The Year Of: </div>
								<div class="col-md-8">
									<input type="text" name="year" class="input-form" required="">								
								</div>
							</div>

									<select name="purok" class="input-form mtop-10" required>
										<option disabled selected value="">Purok</option>
<?php

	$sql = mysqli_query($conn, "SELECT * FROM purok");

		while($row = mysqli_fetch_array($sql)){

?>
										<option value="<?php echo $row['purok_id'] ?>"><?php echo $row['purok'] ?></option>
<?php
}
?>
									</select>

							<hr>

							<div class="row mtop-10">
								<div class="col-md-4" style="padding-top: 8px; padding-right: 0px">
								</div>
								<div class="col-md-4 text-center">
									Male
								</div>
								<div class="col-md-4 text-center" style="padding-left: 0px">
									Female
								</div>

								<div class="col-md-12">
									
								</div>
							</div>	

							<div class="row mtop-10">
								<div class="col-md-4" style="padding-top: 8px; padding-right: 0px">
									below 18 years old
								</div>
								<div class="col-md-4">
									<input type="text" name="belowM" class="input-form pad5p" required>
								</div>
								<div class="col-md-4" style="padding-left: 0px">
									<input type="text" name="belowF" class="input-form pad5p" id="lname" required>
								</div>

								<div class="col-md-12">
									
								</div>
							</div>	

							<div class="row mtop-10">
								<div class="col-md-4" style="padding-top: 8px; padding-right: 0px">
									18 to 59 years old
								</div>
								<div class="col-md-4">
									<input type="text" name="midM" class="input-form pad5p" required>
								</div>
								<div class="col-md-4" style="padding-left: 0px">
									<input type="text" name="midF" class="input-form pad5p" id="lname" required>
								</div>

								<div class="col-md-12">
									
								</div>
							</div>	

							<div class="row mtop-10">
								<div class="col-md-4" style="padding-top: 8px; padding-right: 0px">
									60 above years old
								</div>
								<div class="col-md-4">
									<input type="text" name="aboveM" class="input-form pad5p" required>
								</div>
								<div class="col-md-4" style="padding-left: 0px">
									<input type="text" name="aboveF" class="input-form pad5p" id="lname" required>
								</div>

								<div class="col-md-12">
									
								</div>
							</div>	

							<hr>
							<div class="text-right">
								<button class="btn btn-primary hover" id="genCer_btn">Save</button>	
							</div>	
						</form>
					</div>
					<div class="col-md-6">
						<table class="table table-striped">
							<tr class="text-center">
								<td class="border">YEAR</td>
								<td class="border">TOTAL POPULATION</td>
								<td class="border"></td>
							</tr>
<?php
$overall = 0;
	$sql2 = mysqli_query($conn, "SELECT * FROM population GROUP BY year");
		while($row2 = mysqli_fetch_array($sql2)){
$year = $row2['year'];
$totalP = 0;
	$sql = mysqli_query($conn, "SELECT * FROM population WHERE year = '$year'");
		while($row = mysqli_fetch_array($sql)){

			$totalP += $row['belowM'] + $row['belowF'] + $row['midM'] + $row['midF'] + $row['aboveM'] + $row['aboveF'];
		}
?>
							<tr>
								<td class="border text-center"><?php echo $row2['year'] ?></td>
								<td class="border text-center"><?php echo $totalP ?></td>
						<td class="border hover showGrid" style="width: 50px" id="<?php echo $row2['year']; ?>">
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
	</div>
</div>


<div class="modal" id="grid">
	<div class="modal-content animate" style="background-color: #fff; background-position: center; background-blend-mode: darken; width: 60%; padding-left: 8%; padding-right: 8%; padding-bottom: 5%">
		<div class="text-right border close-nav" style="padding: 0%">
			<span class="glyphicon glyphicon-remove font-red hover btn-close cancel" id=""></span>
		</div>

		<div id="gridBody">

		</div>

	</div>
</div>

<script type="text/javascript">
	$(".showGrid").click(function(){
		$("#grid").show();
		$("#gridBody").load("gridPop.php?year="+this.id);
	});
	$(".btn-close").click(function(){
		$("#grid").hide();
	});
</script>



</body>
<?php
include("footer.php");
?>