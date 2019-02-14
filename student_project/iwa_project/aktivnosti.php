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
	

$upit = "SELECT count(*) FROM aktivnost";
if($aktivni_korisnik_tip==1){
$upit.=" where udruga_id in (select udruga_id from udruga where moderator_id = ".$aktivni_korisnik_id.")";
}

if($aktivni_korisnik_tip==2){
	$upit.=" where aktivnost_id in (select aktivnost_id from sudionik where korisnik_id = ".$aktivni_korisnik_id.")";
}

	$conn = SpojiNaBazu($upit);	
	$row = mysqli_fetch_array($conn);
	$broj_redaka = $row[0];
	$broj_stranica = ceil($broj_redaka / $vel_str);


echo "<h1>List "; if($aktivni_korisnik_tip==2){ echo " of my";} echo " activities from"; if($aktivni_korisnik_tip==1){ echo " my";} echo " associations</h1>";
	$upit = "SELECT
udruga.naziv,aktivnost.aktivnost_id,aktivnost.naziv,aktivnost.datum_kreiranja,aktivnost.vrijeme_kreiranja,aktivnost.datum_odrzavanja,
  aktivnost.vrijeme_odrzavanja from udruga left join aktivnost on udruga.udruga_id = aktivnost.udruga_id";
  if($aktivni_korisnik_tip==1){
  $upit.=" WHERE
  udruga.moderator_id = ".$aktivni_korisnik_id;
  }
  
  if($aktivni_korisnik_tip==2){
	$upit.=" where aktivnost.aktivnost_id in (select aktivnost_id from sudionik where korisnik_id = ".$aktivni_korisnik_id.")";
}
  
 $upit.=" order by aktivnost.aktivnost_id desc";
$upit.=" LIMIT " . $vel_str;
	if (isset($_GET['stranica'])){
		$upit = $upit . " OFFSET " . (($_GET['stranica'] - 1) * $vel_str);
		$aktivna = $_GET['stranica'];
	} else {
		$aktivna = 1;
	}

$conn = SpojiNaBazu($upit);

echo '<table>';
echo '<tr>';
echo '<th>Association name</th><th>Activity name</th><th>Date of creation</th><th>Time of creation</th><th >Date of occurance</th><th>Time of occurance</th>';
echo '<th>Total participants</th>';
if($aktivni_korisnik_tip == 0 || $aktivni_korisnik_tip == 1){
echo '<th width="10%">Radnja</th>';	
}

echo '</tr>';
while(list($udrnaziv,$idakt,$nazivakt, $datumkr,$vrijemekr, $datumodrz, $vrijemeodrz)=mysqli_fetch_array($conn)){
	$datumkr = date("d.m.Y",strtotime($datumkr));
	$datumodrz = date("d.m.Y",strtotime($datumodrz));
	if($nazivakt!=""){
	$upd="<a href='aktivnost.php?azuriraj=$idakt'>Ažuriraj</a>";
	}
	else
	{
		$upd="";
	}
		echo "<td>$udrnaziv</td>";
		echo "<td>$nazivakt</td>";
		echo "<td>$datumkr</td><td>$vrijemekr</td><td>$datumodrz</td><td>$vrijemeodrz</td>";

		$brsud = "select count(s.aktivnost_id) from sudionik s where s.aktivnost_id = ".$idakt." group by s.aktivnost_id";
		$conn2 = SpojiNaBazu($brsud);
		
		list($brsudionika)=mysqli_fetch_array($conn2);
		echo "<td align='center'>".($brsudionika-1)." + ja - <a href='aktivnost.php?ostali=$idakt&nazakt=$nazivakt'>popis ostalih</a></td>";
		if($aktivni_korisnik_tip == 0 || $aktivni_korisnik_tip == 1){
		echo "<td>$upd</td>";	
		}
		echo "</tr>";
}
echo '<tr  >';
echo "<td colspan='7'>";
echo "Stranice: ";
		for ($i = 1; $i <= $broj_stranica; $i++) {
			if($i==$aktivna){
				$str = "<strong>$i</strong>";
			}
			else
			{
				$str=$i;
			}
			echo " <a href=\"aktivnosti.php?stranica=" .$i. "\">$str</a>";
		}
echo "</td>";
echo '</tr>';
echo '</table>';	
if($aktivni_korisnik_tip == 0 || $aktivni_korisnik_tip == 1){ 
	echo "<br><a href='aktivnost.php?dodaj=1'>Add new activity</a>";
}	
if($aktivni_korisnik_tip == 0){ 
	echo "<br><a href='aktivnost.php?pokorisniku=1'>Activities per user</a>";
	echo "<br><a href='aktivnost.php?poudruzi=1'>Activities per association</a>";
}
include("povratak.php");
?>

    </div>
    </div>
<?php
include("footer.php");
?>