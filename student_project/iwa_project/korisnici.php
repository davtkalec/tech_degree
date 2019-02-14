<?php
include("header.php");
?>
      <div id="content">
        <?php

		
		$_SESSION['url']=$_SERVER['REQUEST_URI'];
	echo "<form name='korisnik' method='POST' id='korisnikpretraga' action='korisnici.php' onsubmit=\"return CheckValidationInputs('korisnikpretraga')\">";
	echo "<p>User name: <input type='text' name='ime' id='ime'></p>";
	echo "<p>User type: 
	<br/><input type='radio' name='tip[]' value='0'> Administrator
	<br/><input type='radio' name='tip[]' value='1'> Moderator
	<br/><input type='radio' name='tip[]' value='2'> Korisnik
	</p>";
	echo "<p><input type='submit' name='SearchUsers' value='Pretrazi'></p>";
	echo "</form>";
	echo "<label id=\"poruka\"></label>";
	
	echo "<h2>List of users</h2>";
	
	
	
	$upit = "SELECT count(*) FROM korisnik";

		if(isset($_POST['SearchUsers'])){
		$ime = $_POST['ime'];
		$tip = $_POST['tip'];
		$tip = $tip[0];
		$upit.=" where ime like '%$ime%' and tip_id='$tip'";
	}
	
	$conn = SpojiNaBazu($upit);		
	$row = mysqli_fetch_array($conn);
	$broj_redaka = $row[0];
	
	$broj_stranica = ceil($broj_redaka / $vel_str);
	
	
	

	$upit = "SELECT * FROM korisnik";
	
	if(isset($_POST['SearchUsers'])){
		$ime = $_POST['ime'];
		$tip = $_POST['tip'];
		$tip = $tip[0];
		$upit.=" where ime like '%$ime%' and tip_id='$tip'";
	}

	$upit.=" order by korisnik_id LIMIT " . $vel_str;

		if (isset($_GET['stranica'])){
		$upit = $upit . " OFFSET " . (($_GET['stranica'] - 1) * $vel_str);
		$aktivna = $_GET['stranica'];
	} else {
		$aktivna = 1;
	}
	
	$conn = SpojiNaBazu($upit);	
	
	echo "<table>";
	echo "<tr>";
		echo "<th>Username</th>";
	echo "<th>Name</th>";
	echo "<th>Surname</th>";
	echo "<th>E-mail</th>";
	echo "<th>Password</th>";		 
	echo "<th>Pic</th>";		 
	echo "<th>Action</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while(list($id, $tip, $kor_ime,$lozinka,$ime,$prezime,$email, $slika) = 
		mysqli_fetch_array($conn)) {				
		echo "<tr>";
		echo "<td>$kor_ime</td>";
		echo "<td>$ime</td>";		
		echo "<td>$prezime</td>";		
		echo "<td>$email</td>";
		echo "<td>$lozinka</td>";
		echo "<td><img src='$slika' width='90px' height='94px'></td>";
		if ($aktivni_korisnik_tip==0) {
			echo "<td><a href='korisnik.php?korisnik=$id'>Ažuriraj</a></td>";
		}
		echo	"</tr>";
	}
	echo "<tr>";
	echo "<td colspan='7'>Stranice: ";
			if ($aktivna != 1) { 
			$prethodna = $aktivna - 1;
			echo "<a href=\"korisnici.php?stranica=" .$prethodna . "\">&lt;</a>";	
			}
			for ($i = 1; $i <= $broj_stranica; $i++) {
			echo "<a ";
			if ($aktivna == $i) {
				$glavnastr="<mark>$i</mark>";
			}
			else
			{
				$glavnastr = $i;
			}
			echo "' href=\"korisnici.php?stranica=" .$i . "\"> $glavnastr </a>";
			}
			if ($aktivna < $broj_stranica) {
			$sljedeca = $aktivna + 1;
			echo "<a href=\"korisnici.php?stranica=" .$sljedeca . "\">&gt;</a>";	
			}
			echo "</td>";
	echo "</tr>";

	echo "</table>";
	
	if ($aktivni_korisnik_tip==0) {
		echo '<a href="korisnik.php?dodaj=1">Add user</a>';
	} else if(isset($_SESSION["aktivni_korisnik_id"])) {
		echo '<a href="korisnik.php?korisnik=' . $_SESSION["aktivni_korisnik_id"] . '">Edit my info</a>';
	}
	
	function TipoviKorisnika($tip){
		
		$upit = "select tip_id, naziv from tip_korisnika where tip_id = ".$tip;
		$conn = SpojiNaBazu($upit);	
		
		list($tipid,$naziv)=mysqli_fetch_array($conn);
		
		return $naziv;
	}

include("povratak.php");
?>

    </div>
    </div>
<?php
include("footer.php");
?>