<?php
include("db/db.php");

$year = $_GET['year'];
?>
						<table class="table table-striped" style="font-size: .8em">
							<tr class="text-center">
								<td class="border">Purok</td>
								<td class="border">Least Population</td>
								<td class="border">Most Population</td>
								<td class="border">Total Population</td>
							</tr>
<?php
$sql = mysqli_query($conn, "SELECT * FROM population NATURAL JOIN purok WHERE year = '$year'");
$leastM = "";
$leastF = "";
$mostM = "";
$mostF = "";
$value = "";

$l1 = "Below 18 Yrs Old";
$l2 = "18 to 59 Yrs Old";
$l3 = "Above 60 Yrs Old";

$result = "";
	while($row = mysqli_fetch_array($sql)){
		$bM = $row['belowM'];
		$bF = $row['belowF'];
		$mM = $row['midM'];
		$mF = $row['midF'];
		$aM = $row['aboveM'];
		$aF = $row['aboveF'];
//echo "<hr>";
if($bM < $mM AND $bM < $aM){
	$leastM = $bM;
	$Fl = $l1;
}
if($mM < $bM AND $mM < $aM){
	$leastM = $mM;
	$Fl = $l2;
}
if($aM < $bM AND $aM < $mM){
 	$leastM = $aM;
	$Fl = $l3;
}
 $leastM;
//echo "<hr>";
if($bF < $mF AND $bF < $aF){
	$leastF = $bF;
	$Fl = $l1;
}
if($mF < $bF AND $mF< $aF){
	$leastF = $mF;
	$Fl = $l2;
}
if($aF < $bF AND $aF < $mF){
	$leastF = $aF;
	$Fl = $l3;
}
 $leastF ."-". $row['purok'];

if($leastM <> $leastF){
	if($leastF < $leastM){
		$finalLeast = $leastF;
		$value = "Female";

		$finalLeast = $value ." - ". $Fl ."(". $finalLeast .")";
	}else{
		 $finalLeast = $leastM;	
		$value = "Male";

		$finalLeast = $value ." - ". $Fl ."(". $finalLeast .")";
	}
}else{
	$finalLeast = "Male - ". $Fl ."(".$leastM .")<br> Female - ". $Fl ."(". $leastF.")";
}
//echo $finalLeast;
//echo "<hr>";
//echo $finalLeast;
if($bM > $mM AND $bM > $aM){
	$mostM = $bM;
	$Fl = $l1;
}
if($mM > $bM AND $mM > $aM){
	$mostM = $mM;
	$Fl = $l1;
}
if($aM > $bM AND $aM > $mM){
	$mostM = $aM;
	$Fl = $l1;
}
$mostM;

if($bF > $mF AND $bF > $aF){
	$mostF = $bF;
	$Fl = $l1;
}
if($mF > $bF AND $mF>$aF){
	$mostF = $mF;
	$Fl = $l1;
}
if($aF > $bF AND $aF > $mF){
	$mostF = $aF;
	$Fl = $l1;
}
$mostF;

if($mostM <> $mostF){
	if($mostF > $mostM){
		$finalmost = $mostF;
		$value = "Female";

		$finalmost = $value ." - ". $Fl ."(". $finalmost .")";
	}else{
		 $finalmost = $mostM;	
		$value = "Male";

		$finalmost = $value ." - ". $Fl ."(". $finalmost .")";
	}
}else{
	$finalmost = "Male - ". $Fl ."(".$mostM .")<br> Female - ". $Fl ."(". $mostF.")";
}


			 $totalP = $row['belowM'] + $row['belowF'] + $row['midM'] + $row['midF'] + $row['aboveM'] + $row['aboveF'];
?>
							<tr>
								<td class="border"><?php echo "Purok ".$row['purok'] ?></td>
								<td class="border text-center"><?php echo $finalLeast ?></td>
								<td class="border text-center"><?php echo $finalmost ?></td>
								<td class="border text-center"><?php echo $totalP ?></td>
							</tr>
<?php
}
?>
						</table>             



	<canvas id="gridChart" class="border"></canvas>
<?php

$totalP = 0;
$label = "";
$valueDisplay = "";
	$sql = mysqli_query($conn, "SELECT * FROM population NATURAL JOIN purok WHERE year = '$year'");
		while($row = mysqli_fetch_array($sql)){

			$label .= "'Purok ".$row['purok']."',";

			 $totalP = $row['belowM'] + $row['belowF'] + $row['midM'] + $row['midF'] + $row['aboveM'] + $row['aboveF'];

			$valueDisplay .= $totalP.",";
		}

		 $label = substr($label, 0, -1);
		 $valueDisplay = substr($valueDisplay, 0, -1);
?>
<script>
var ctx2 = document.getElementById("gridChart");
	var myRadarChart = new Chart(ctx2, {
	type: 'line',
	data: {
	labels: [<?php echo $label; ?>],
	datasets: [{
		label: 'Total Population',
		data: [<?php echo $valueDisplay; ?>],
		backgroundColor: [
				'rgba(211, 104, 79, 0.2)',
				'rgba(173, 95, 223, 0.2)'
			],
			borderColor: [
				'rgba(211, 104, 79, 1)',
				'rgba(173, 95, 223, 1)'
			],
			borderWidth: 1
	}],
	
},
});
</script>