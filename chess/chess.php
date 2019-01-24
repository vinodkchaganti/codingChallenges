<HTML>
<HEAD>
<style type="text/css">
.block0 {
	width:30px;
	height:30px;
	border:solid 1px #000;
	background:#fff;
}
.block1 {
	width:30px;
	height:30px;
	border:solid 1px #000;
	background:#000;
}
</style>
</HEAD>
<BODY>
<div>

<table cellpadding="0px;" cellspacing="0px;">
<?php
$black= 'black';
$white= 'white';
$size = (!empty($_GET['size']) && $_GET['size'] < 100) ? $_GET['size'] : 8;
/** Second best way tp do */
/**
$finalSize = $size*$size;
$length = (($finalSize%2) == 0) ? $finalSize : $finalSize -1;
$alt = 0;
for ($row = 1; $row <= $length; $row++) {

	echo "<td id='".$row."' class='block".(($row+$alt)%2)."'>&nbsp;</td>";
	if (($row%$size) == 0) {
		echo '</tr><tr>';
		if (($size%2) == 0)
		$alt++;
	}
	$row++;
	echo "<td id='".$row."' class='block".(($row+$alt)%2)."'>&nbsp;</td>";
	if (($row%$size) == 0) {
		echo '</tr><tr>';
		if (($size%2) == 0)
		$alt++;
	}
}
if ($finalSize != $length) {
	echo "<td id='".$row."' class='block".(($row+$alt)%2)."'>&nbsp;</td>";
}
*/
/** First best way to do it */
$length = 2*$size;
$row1 = $row2 = '<tr>';
$rowname = 'row1';
$even = (($size%2) == 0) ? true : false;
for ($row = 1, $alt=0; $row <= $length; $row++) {
	$$rowname .=  "<td id='".$row."' class='block".(($row+$alt)%2)."'>&nbsp;</td>";
	if ($row == $size) {
		$row1 .= '</tr>';
		$rowname = 'row2';
		if ($even)
		$alt++;
	}
}
$row2 .= '</tr>';

if ($even) {
	$length = $size/2;
} else {
	echo $row1;
	$length = (($size-1)/2);
}
$row = 1;
while ($row <= $length) {
	echo $row2.$row1;
	$row++;
}
?>

</table>

<div>
<script type="text/javascript">
function checkThreat () {
	var Kxp = document.getElementById('Kx').value;
	var Kxp = document.getElementById('Kx').value;
	var Kxp = document.getElementById('Kx').value;
	var Kxp = document.getElementById('Kx').value;
}
var xy = {
			item: {
				vattt:1,
				ky:"13dsddsd",
				zz:"ddd"
			},
			item: {
				vattt:12,
				ky:"13dsdsddsd",
				zz:"ddddsd"
			},
			item: {
				vattt:144,
				ky:"13dsddddaaadsd",
				zz:"dddlkkk"
			}	
		};
//alert(Object.keys(xy).length);
var jsonss=[{"id":"431","code":"0.85.PSFR01215","price":"2457.77","volume":"23.0","total":"565.29"},{"id":"430","code":"0.85.PSFR00608","price":"1752.45","volume":"4.0","total":"70.1"},{"id":"429","code":"0.84.SMAB00060","price":"4147.5","volume":"2.0","total":"82.95"},{"id":"428","code":"0.84.SMAB00050","price":"4077.5","volume":"3.0","total":"122.32"}];
var objaa = JSON.parse(jsonss);
var length = Object.keys(objaa).length;
alert(length);
		</script
</BODY>
</HTML>