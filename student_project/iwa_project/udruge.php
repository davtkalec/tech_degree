<?php
include("header.php");
?>
      <div id="content">
        <?php

$sql = "SELECT count(*) FROM udruga";
$colspan=3;
if($aktivni_korisnik_tip==1){
	
$sql .=	" where moderator_id = ".$aktivni_korisnik_id;
}
	$conn = SpojiNaBazu($sql);	
	$row = mysqli_fetch_array($conn);
	$broj_redaka = $row[0];
	
	$broj_stranica = ceil($broj_redaka / $vel_str);


echo "<h1>Association list</h1>";
	$upit = "select udruga_id, naziv from udruga";
	if($aktivni_korisnik_tip==1){
	
	$upit .=	" where moderator_id = ".$aktivni_korisnik_id;
	}
	
	$upit.= " LIMIT " . $vel_str;
	
	if (isset($_GET['stranica'])){
		$upit = $upit . " OFFSET " . (($_GET['stranica'] - 1) * $vel_str);
		$aktivna = $_GET['stranica'];
	} else {
		$aktivna = 1;
	}

$conn = SpojiNaBazu($upit);

echo '<table>';
echo '<tr>';
echo '<th>Association ID</th><th>Association name</th><th>Details</th>';
if($aktivni_korisnik_tip==0){
echo '<th>Action</th>';	
}
echo '</tr>';
while(list($id,$naziv)=mysqli_fetch_array($conn)){
	$detalji = "<a href='udruga.php?detalji=$id'>Preview</a>";
	$upd = "<a href='udruga.php?azuriraj=$id'>Update</a>";
echo '<tr>';
echo "<td>$id</td><td>$naziv</td><td>$detalji</td>";
if($aktivni_korisnik_tip==0){
echo "<td>$upd</td>";	
$colspan=4;
}
echo '</tr>';
}
echo '<tr>';
echo "<td colspan='$colspan'>";
echo "Pages: ";
		for ($i = 1; $i <= $broj_stranica; $i++) {
			if($i==$aktivna){
				$str = "<strong>$i</strong>";
			}
			else
			{
				$str=$i;
			}
			echo " <a href=\"udruge.php?stranica=" .$i. "\">$str</a>";
		}
echo "</td>";
echo '</tr>';
echo '</table>';	
if($aktivni_korisnik_tip == 0){ 
	echo "<br><a href='udruga.php?dodaj=1'>Add new association</a>";
}
include("povratak.php");
?>
    </div>
    </div>
<?php
include("footer.php");
?>