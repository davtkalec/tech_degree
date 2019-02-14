<?php
include("header.php");
?>
      <div id="content">
        <?php

if(!is_integer(strpos($_SERVER['QUERY_STRING'],"pokorisniku")) && !is_integer(strpos($_SERVER['QUERY_STRING'],"poudruzi"))){
		if(isset($_SESSION['sort'])){
			$_SESSION['sort']='';
		}	
	}


if(isset($_GET['detalji']) || isset($_GET['pretraga'])){
	
	
	
	echo "<form name='pretraga' method='GET' action='aktivnost.php'>";
	echo "<p>Activity name: <input type='text' name='naziv' id='naziv' onkeyup='DisableDates()'></p>";
	echo "<p>Date from: <input type='text' name='datumOd' id='datumOd' onkeyup='DisableNaziv()'></p>";
	echo "<p>Date untill: <input type='text' name='datumDo' id='datumDo' onkeyup='DisableNaziv()'></p>";
	echo "<p><input type='submit' name='pretraga' value='Pretraži'></p>";
	echo "</form>";
	echo "<p></p>";
	
	
echo "<h2>Activity details:</h2>";
	$aktivnosti = "select 
  udruga.udruga_id,
  udruga.naziv,
aktivnost.aktivnost_id,
  aktivnost.naziv,
  aktivnost.datum_kreiranja,
  aktivnost.vrijeme_kreiranja,
  aktivnost.datum_odrzavanja,
  aktivnost.vrijeme_odrzavanja,
  aktivnost.opis
from udruga left join aktivnost 
  on udruga.udruga_id = aktivnost.udruga_id";
  
  if(isset($_GET['detalji'])){
	  $id=$_GET['detalji'];
  $aktivnosti.=" where aktivnost.aktivnost_id =".$id;
  }
  
  if(isset($_GET['pretraga'])){
		
		
		if(!empty($_GET['datumOd']) || !empty($_GET['datumDo'])){
		$datumOd = date("Y-m-d",strtotime($_GET['datumOd']));
		$datumDo = date("Y-m-d",strtotime($_GET['datumDo']));
		$aktivnosti.=" where (datum_odrzavanja between '$datumOd' and '$datumDo')";
		}
				
		

		if(!empty($_GET['naziv'])){
		$naziv = $_GET['naziv'];
		$aktivnosti.=" where aktivnost.naziv like '%$naziv%'";
		}
	}
	$conn = SpojiNaBazu($aktivnosti);
	while(list($udrid,$udrnaziv,$aktid,$nazivakt, $datumkr,$vrijemekr, $datumodrz, $vrijemeodrz, $opis)=mysqli_fetch_array($conn)){
	$datumkr = date("d.m.Y",strtotime($datumkr));
	$datumodrz = date("d.m.Y",strtotime($datumodrz));

	echo "<p><strong>Association name: </strong>".$udrnaziv."</p>";
	echo "<p><strong>Activity name: </strong>".$nazivakt."</p>";
	echo "<p><strong>Date of creation: </strong>".$datumkr."</p>";
	echo "<p><strong>Time of creation: </strong>".$vrijemekr."</p>";
	echo "<p><strong>Date: </strong>".$datumodrz."</p>";
	echo "<p><strong>Time: </strong>".$vrijemeodrz."</p>";
	echo "<p><strong>Description: </strong>".$opis."</p>";
	echo "<p><strong><a href='aktivnost.php?ostali=$aktid&nazakt=$nazivakt'>Other users in this activity</a></strong></p>";
	echo "<hr width='95%'>";
	}

	if(mysqli_num_rows($conn)==0){
		echo "No details!";
	}
	echo "</p>";
}


if(isset($_GET['ostali'])){
	$id = $_GET['ostali'];
	$nazivakt = $_GET['nazakt'];
	echo "<h2>Other members in this activity <strong>".$nazivakt."<strong>:</h2>";	
	$upit = "SELECT
  kor.korisnik_id,
concat(kor.ime,' ',kor.prezime)
from korisnik kor
  where kor.korisnik_id in (select korisnik_id from sudionik where aktivnost_id = ".$id." and korisnik_id <> ".$aktivni_korisnik_id.")";
  
  
	$conn = SpojiNaBazu($upit);
	echo "<ol>";
	while(list($korid,$kornaziv)=mysqli_fetch_array($conn)){
	echo "<li>$kornaziv</li>";	
	}
	echo "<ol>";
	
}


if(isset($_GET['pokorisniku'])){
	
	$upit = "SELECT
concat(kor.ime,' ',kor.prezime),
  count(sud.korisnik_id) as 'broj_aktivnosti'
from korisnik kor left join sudionik sud
  on kor.korisnik_id = sud.korisnik_id
group by sud.korisnik_id";
	
	$conn = SpojiNaBazu($upit);	
	$row = mysqli_fetch_array($conn);
	$broj_redaka = mysqli_num_rows($conn);
	
	$broj_stranica = ceil($broj_redaka / $vel_str);
	
	$upit = "SELECT
concat(kor.ime,' ',kor.prezime),
  count(sud.korisnik_id) as 'broj_aktivnosti'
from korisnik kor left join sudionik sud
  on kor.korisnik_id = sud.korisnik_id
group by sud.korisnik_id";
if(isset($_GET['sort'])){
	
	if($_GET['sort']=='kasc'){
		$_SESSION['sort']=" order by concat(kor.ime,' ',kor.prezime) asc";
	}
	if($_GET['sort']=='kdesc'){
		$_SESSION['sort']=" order by concat(kor.ime,' ',kor.prezime) desc";
	}
	if($_GET['sort']=='basc'){
		$_SESSION['sort']=" order by count(sud.korisnik_id) asc";
	}
	if($_GET['sort']=='bdesc'){
		$_SESSION['sort']=" order by count(sud.korisnik_id) desc";
	}
}
else
{
	if(!isset($_SESSION['sort'])){
	$_SESSION['sort']='';	
	}

}
$upit.=$_SESSION['sort'];
$upit.=" limit ".$vel_str;

	if (isset($_GET['stranica'])){
		$upit = $upit . " OFFSET " . (($_GET['stranica'] - 1) * $vel_str);
		$aktivna = $_GET['stranica'];
	} else {
		$aktivna = 1;
	}

$conn = SpojiNaBazu($upit);

$up = "&#9650";
$down = "&#9660";
$kup = "<a href='aktivnost.php?pokorisniku=1&sort=kasc' title='Uzlazno'>$up</a>";
$kdown = "<a href='aktivnost.php?pokorisniku=1&sort=kdesc' title='Silazno'>$down</a>";
$bup = "<a href='aktivnost.php?pokorisniku=1&sort=basc' title='Uzlazno'>$up</a>";
$bdown = "<a href='aktivnost.php?pokorisniku=1&sort=bdesc' title='Silazno'>$down</a>";
echo "<h1>Activities per user</h1>";
echo '<table border="1">';
echo '<tr >';
echo "<th>User $kup $kdown</th><th>Number $bup $bdown</th>";
echo '</tr>';
while(list($korisnik,$broj)=mysqli_fetch_array($conn)){
echo '<tr >';
echo "<td>$korisnik</td><td>$broj</td>";
echo '</tr>';
}
echo '<tr  >';
echo "<td colspan='2'>";
echo "Stranice: ";
		for ($i = 1; $i <= $broj_stranica; $i++) {
			if($i==$aktivna){
				$str = "<strong>$i</strong>";
			}
			else
			{
				$str=$i;
			}
			echo " <a href=\"aktivnost.php?pokorisniku=1&stranica=" .$i. "\">$str</a>";
		}
echo "</td>";
echo '</tr>';
echo '</table>';	
}


if(isset($_GET['poudruzi'])){

	$sql = "SELECT
udruga.naziv,
  count(aktivnost.udruga_id) as 'broj_aktivnosti'
from udruga left join aktivnost 
  on udruga.udruga_id = aktivnost.udruga_id
  GROUP by aktivnost.udruga_id";
	
	$rs = SpojiNaBazu($sql);	
	$row = mysqli_fetch_array($rs);
	$broj_redaka = mysqli_num_rows($rs);
	
	$broj_stranica = ceil($broj_redaka / $vel_str);
	
	$upit = "SELECT
udruga.naziv,
  count(aktivnost.udruga_id) as 'broj_aktivnosti'
from udruga left join aktivnost
  on udruga.udruga_id = aktivnost.udruga_id
  GROUP by aktivnost.udruga_id";

if(isset($_GET['sort'])){
	
	if($_GET['sort']=='nasc'){
		$_SESSION['sort']=" order by udruga.naziv asc";
	}
	if($_GET['sort']=='ndesc'){
		$_SESSION['sort']=" order by udruga.naziv desc";
	}
	if($_GET['sort']=='basc'){
		$_SESSION['sort']=" order by count(aktivnost.udruga_id) asc";
	}
	if($_GET['sort']=='bdesc'){
		$_SESSION['sort']=" order by count(aktivnost.udruga_id) desc";
	}
}
else
{
	if(!isset($_SESSION['sort'])){
	$_SESSION['sort']='';	
	}

}
$upit.=$_SESSION['sort'];
$upit.=" limit ".$vel_str;

	if (isset($_GET['stranica'])){
		$upit = $upit . " OFFSET " . (($_GET['stranica'] - 1) * $vel_str);
		$aktivna = $_GET['stranica'];
	} else {
		$aktivna = 1;
	}

$conn = SpojiNaBazu($upit);

$up = "&#9650";
$down = "&#9660";
$nup = "<a href='aktivnost.php?poudruzi=1&sort=nasc' title='Uzlazno'>$up</a>";
$ndown = "<a href='aktivnost.php?poudruzi=1&sort=ndesc' title='Silazno'>$down</a>";
$bup = "<a href='aktivnost.php?poudruzi=1&sort=basc' title='Uzlazno'>$up</a>";
$bdown = "<a href='aktivnost.php?poudruzi=1&sort=bdesc' title='Silazno'>$down</a>";
echo "<h1>Number of activities per association</h1>";
echo '<table border="1">';
echo '<tr >';
echo "<th>Name $nup $ndown</th><th>Number $bup $bdown</th>";
echo '</tr>';
while(list($naziv,$broj)=mysqli_fetch_array($conn)){
echo '<tr >';
echo "<td>$naziv</td><td>$broj</td>";
echo '</tr>';
}
echo '<tr  >';
echo "<td colspan='2'>";
echo "Pages: ";
		for ($i = 1; $i <= $broj_stranica; $i++) {
			if($i==$aktivna){
				$str = "<strong>$i</strong>";
			}
			else
			{
				$str=$i;
			}
			echo " <a href=\"aktivnost.php?poudruzi=1&stranica=" .$i. "\">$str</a>";
		}
echo "</td>";
echo '</tr>';
echo '</table>';	
}

if(isset($_POST['FormActivity'])){
	
	
	$idakt=$_POST['idakt'];
	$udruga=$_POST['udruga'];
	$dat_kreiranja=$_POST['dat_kreiranja'];
	$dat_kreiranja = date("Y-m-d",strtotime($dat_kreiranja));
	$vrijeme_kreiranja=$_POST['vrijeme_kreiranja'];
	$dat_odrzavanja=$_POST['dat_odrzavanja'];
	$dat_odrzavanja = date("Y-m-d",strtotime($dat_odrzavanja));
	$vrijeme_odrzavanja=$_POST['vrijeme_odrzavanja'];
	$sudionici=$_POST['sudionici'];
	$naziv=$_POST['naziv'];
	$opis=$_POST['opis'];
	
	if($idakt>0){
		$upit = "update aktivnost set udruga_id='$udruga', datum_odrzavanja='$dat_odrzavanja', vrijeme_odrzavanja='$vrijeme_odrzavanja', naziv='$naziv', opis='$opis' where aktivnost_id = ".$idakt;
		
		
		$sudioniciExist = PostojeciSudionici($idakt);
		$postojeci=count($sudioniciExist);
		
		if($postojeci>0){			
			$brisi = "delete from sudionik where aktivnost_id = ".$idakt;
			$conn = SpojiNaBazu($brisi);
		}
			
	}
	else
	{
		$upit = "insert into aktivnost values ('','$udruga','$dat_kreiranja','$vrijeme_kreiranja','$dat_odrzavanja','$vrijeme_odrzavanja','$naziv','$opis')";
	}
		$conn = SpojiNaBazu($upit);
		if($idakt==0){
		$novaakt = mysqli_insert_id($dbc);
		}
		else
		{
			$novaakt = $idakt;
		}
		foreach($sudionici as $sudionik){
		$upit = "insert into sudionik values ('$novaakt','$sudionik')";
		$conn = SpojiNaBazu($upit);
		}
	header("Location: aktivnosti.php");
	
}



if(isset($_GET['dodaj']) || isset($_GET['azuriraj'])){
	
	if(isset($_GET['azuriraj'])){
		
		$idakt = $_GET['azuriraj'];
		$aktivnost = "select * from aktivnost where aktivnost_id = ".$idakt;
		$conn = SpojiNaBazu($aktivnost);
		list($aktid,$udrid,$datumkr,$vrijemekr, $datumodrz, $vrijemeodrz, $naziv,$opis)=mysqli_fetch_array($conn);

	}
	else
	{
		$aktid=0;
		$korid="";
		$udrid="";
		$naziv="";
		$datumkr = "";
		$vrijemekr = "";
		$datumodrz = "";
		$vrijemeodrz = "";
		$opis = "";
	}
	
	?>


		<form method="post" id="akivnost" action="aktivnost.php" onsubmit="return CheckValidationInputs('aktivnost')">		
			<table>
			<input type="hidden" name="idakt" id="idakt" value="<?php echo $aktid; ?>">
				<tr>
					<td><label for="udruga">Choose an association:</label></td>
					<td>
					<select name="udruga" id="udruga">
					<?php
					$udruge = "select udruga_id, naziv from udruga";
					if($aktivni_korisnik_tip==1){
					$udruge.= " where moderator_id = ".$aktivni_korisnik_id;
					}
					$conn = SpojiNaBazu($udruge);
					while(list($id,$nazivudr)=mysqli_fetch_array($conn)){
						echo "<option value='$id'";
						if($id==$udrid){
							echo " selected";
						}
						echo ">$nazivudr</option>";
					}
					?>					
					</select>
					</td>
				</tr>
				<tr >
					<td><label for="naziv">Activity name:</label></td>
					<td><input type="text" name="naziv" id="naziv" value="<?php echo $naziv; ?>"/></td>
				</tr>
				<tr >
					<td><label for="datumkr">Date of creation:</label></td>
					<?php
					if($aktid==0){
						$datumkr = date("d.m.Y");
						$vrijemekr = date("H:i:s");
						$readonly = "";
					}
					else
					{
						$readonly = "readonly='readonly'";
					}
					?>
					<td><input type="text" name="dat_kreiranja" id="dat_kreiranja"  value="<?php echo $datumkr; ?>" <?php echo $readonly; ?>/></td>
				</tr>
				
				<tr >
					<td><label for="vrijemekr">Time of creation:</label></td>
					<td><input type="text" name="vrijeme_kreiranja" id="vrijeme_kreiranja"  value="<?php echo $vrijemekr; ?>" <?php echo $readonly; ?> /></td>
				</tr>
				<tr >
					<td><label for="datumodrz">Date:</label></td>
					<td><input type="text" name="dat_odrzavanja" id="dat_odrzavanja" value="<?php echo $datumodrz; ?>" placeholder="dd.mm.gggg"/></td>
				</tr>
				
				<tr >
					<td><label for="vrijemeodrz">Time:</label></td>
					<td><input type="text" name="vrijeme_odrzavanja" id="vrijeme_odrzavanja" value="<?php echo $vrijemeodrz; ?>" placeholder="hh:mm:ss"/></td>
				</tr>
				<tr >
					<td><label for="sudionici">Participants:</label></td>
					<td>
					 <select name="sudionici[]" id="sudionici" multiple="multiple" size="7" onchange="Odabranih()">
					<?php
					$sudionici = "select korisnik_id, concat(ime,' ',prezime) from korisnik";
					$conn = SpojiNaBazu($sudionici);
					while(list($id,$nazivkor)=mysqli_fetch_array($conn)){
						$sudionici = PostojeciSudionici($aktid);
						echo "<option value='$id'";
						if(in_array($id,$sudionici)){
							echo " selected";
						}
						echo ">$nazivkor</option>";
					}
					?>	
					</select><br><label for="odabranih" id="odabranih"></label>
					</td>
				</tr>
				<tr >
					<td><label for="opis">Opis:</label></td>
					<td><textarea name="opis" id="opis" rows="10" cols="40"><?php echo $opis; ?></textarea></td>
				</tr>
				<tr >
					<td colspan="2"><input type="submit" name="FormActivity" value="Pošalji"/></td>
				</tr>
			</table>
			<label id="poruka"></label>
		</form>		
<?php
	
}


function PostojeciSudionici($idakt){
	
			
		$upit = "select * from sudionik where aktivnost_id = ".$idakt;
		$conn = SpojiNaBazu($upit);
		$sudionici=array();
		while(list($idakt,$sudionik)=mysqli_fetch_array($conn)){
		$sudionici[]=$sudionik;
		}
		return $sudionici;
	
}

include("povratak.php");
?>

    </div>
    </div>
<?php
include("footer.php");
?>