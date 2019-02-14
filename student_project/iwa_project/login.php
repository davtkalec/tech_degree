<?php
include("dbconn.php");
if(session_id()==""){
session_start();
}


if(isset($_POST['loginenter'])){

		$korisnik=$_POST['username']; 
		$sifra=$_POST['password'];

		if(!empty($korisnik) && !empty($sifra)){

			$query="SELECT korisnik_id,tip_id,korisnicko_ime,ime,prezime FROM korisnik WHERE korisnicko_ime='$korisnik' AND lozinka='$sifra'";
			$conn = SpojiNaBazu($query);
			if(mysqli_num_rows($conn)!=0){
				
				list($idkor,$idtip,$korime,$ime,$prezime)=mysqli_fetch_array($conn);
				
				$_SESSION['aktivni_korisnik']=$korime;
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime;
				$_SESSION["aktivni_korisnik_id"]=$idkor;
				$_SESSION['aktivni_korisnik_tip']=$idtip;
				
			}
			else
			{
				$_SESSION["poruka"]="<strong>You've entered invalid login information!</strong>";
				header("Location: index.php");
				return false;
			}

		}
		
		header("Location:index.php");
	}
?>