<?php
include("header.php");
?>
      <div id="content">
        <?php

if(isset($_GET['detalji'])){

	$id=$_GET['detalji'];
	
	echo "<h1>Opći detalji o udruzi</h1>";
	
	$udruga = "select naziv, opis from udruga where udruga_id = ".$id;
	$conn = SpojiNaBazu($udruga);
	
	list($naziv,$opis)=mysqli_fetch_array($conn);
	echo "<p><strong>Association name: </strong>".$naziv."</p>";
	echo "<p><strong>Description: </strong>".$opis."</p>";
	echo "<h2>Activities:</h2>";
	if($aktivni_korisnik_tip==2){
	echo " - (only your activities shown)";
	}
	
	$aktivnosti = "select 
  udruga.udruga_id,udruga.naziv,aktivnost.aktivnost_id,aktivnost.naziv,aktivnost.datum_kreiranja,aktivnost.vrijeme_kreiranja,aktivnost.datum_odrzavanja,
  aktivnost.vrijeme_odrzavanja,aktivnost.opis
from udruga left join aktivnost on udruga.udruga_id = aktivnost.udruga_id where aktivnost.udruga_id =".$id;
  if($aktivni_korisnik_tip==2){
  $aktivnosti.=" and aktivnost.aktivnost_id in (select aktivnost_id from sudionik where korisnik_id = ".$aktivni_korisnik_id.")";
  }
	$conn = SpojiNaBazu($aktivnosti);
    $zaduzen="";
	echo "<ul>";
	while(list($udrid,$udrnaziv,$aktid,$nazivakt, $datumkr,$vrijemekr, $datumodrz, $vrijemeodrz, $opis)=mysqli_fetch_array($conn)){
	$datumkr = date("d.m.Y",strtotime($datumkr));
	$datumodrz = date("d.m.Y",strtotime($datumodrz));
	if($aktivni_korisnik_tip==-1){
	echo "<li>$nazivakt</li>";		
	}
	else
	{
	echo "<li><a href='aktivnost.php?detalji=$aktid'>$nazivakt</a></li>";	
	}
	
	}
	echo "<ul>";
	if(mysqli_num_rows($conn)==0){
		echo "No activities!";
	}
	echo "</p>";
}


if(isset($_POST['FrmUdruga'])){
	
	
	$idudr=$_POST['idudr'];
	$moderator=$_POST['moderator'];
	$naziv=$_POST['naziv'];
	$opis=$_POST['opis'];
	
	if($idudr>0){
		$upit = "update udruga set moderator_id = '$moderator',naziv='$naziv',opis='$opis' where udruga_id = ".$idudr;
	}
	else
	{
		$upit = "insert into udruga values ('','$moderator','$naziv','$opis')";
	}
	
	$conn = SpojiNaBazu($upit);
	header("Location: udruge.php");
}



if(isset($_GET['dodaj']) || isset($_GET['azuriraj'])){
	
	
	if(isset($_GET['azuriraj'])){
		
		$idudr=$_GET['azuriraj'];
		$udruga = "select * from udruga where udruga_id = ".$idudr;
		$conn = SpojiNaBazu($udruga);
		list($idudr,$moderator,$naziv,$opis)=mysqli_fetch_array($conn);
	}
	else
	{
		$idudr=0;
		$moderator="";
		$naziv="";
		$opis = "";		
	}
	
	?>


		<form method="post" id="udruga" action="udruga.php" onsubmit="return CheckValidationInputs('udruga')">		
			<table>
			<input type="hidden" name="idudr" id="idudr" value="<?php echo $idudr; ?>">
				<tr>
					<td><label for="moderator">Choose a moderator:</label></td>
					<td>
					<select name="moderator" id="moderator">
					<?php
					$korisnici = "select korisnik_id, concat(ime,' ',prezime) from korisnik where tip_id = 1";
					$conn = SpojiNaBazu($korisnici);
					while(list($idmod,$nazivmod)=mysqli_fetch_array($conn)){
						echo "<option value='$idmod'";
						if($idmod==$moderator){
							echo " selected";
						}
						echo ">$nazivmod</option>";
					}
					?>					
					</select>
					</td>
				</tr>
				<tr>
					<td><label for="naziv">Association name:</label></td>
					<td><input type="text" name="naziv" id="naziv" value="<?php echo $naziv; ?>"/></td>
				</tr>
				<tr>
					<td><label for="opis">Description:</label></td>
					<td><textarea name="opis" id="opis" rows="10" cols="40"><?php echo $opis; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="FrmUdruga" value="Pošalji"/></td>
				</tr>
			</table>
			<label id="poruka"></label>
		</form>		
<?php
}
include("povratak.php");
?>

    </div>
    </div>
<?php
include("footer.php");
?>