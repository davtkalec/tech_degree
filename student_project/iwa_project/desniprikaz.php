<?php

$upit = "select udruga_id, naziv from udruga order by udruga_id desc";
$conn = SpojiNaBazu($upit);

echo "<h3>Last added sport associations</h3>";
echo "<ul>";
while(list($id,$naziv)=mysqli_fetch_array($conn)){

		$detalji = "<a href='udruga.php?detalji=$id'>$naziv</a>";
		
	echo "<li>$detalji</li>";
}
echo "</ul>";
?>