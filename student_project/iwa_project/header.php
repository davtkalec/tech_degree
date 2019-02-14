<?php
ob_start();
if (session_id() == ""){
		session_start();
}
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	if(isset($_SESSION['aktivni_korisnik'])) {
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		
		if($aktivni_korisnik_tip==0){
			$tip="administrator";
		}
		elseif($aktivni_korisnik_tip==1){
			$tip="moderator";
		}
		else
		{
			$tip="korisnik";
		}
		$aktivni_korisnik_id = $_SESSION["aktivni_korisnik_id"];
	}
include("dbconn.php");	
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Sport associations</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script type="text/javascript" src="javascript/checkinput.js"></script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">Sport <span class="logo_colour">associations</span></a></h1>
          <h2>Enroll in a sport association and follow the activities</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
        <?php
		switch($aktivni_korisnik_tip){
			
			case 0:
			echo '<li><a href="korisnici.php">Users</a></li>';
			echo '<li><a href="aktivnosti.php">Activities</a></li>';			
			break;
			case 1:
			echo '<li><a href="aktivnosti.php">Activities</a></li>';
			break;
			case 2:
			echo '<li><a href="aktivnosti.php">Activities</a></li>';
			break;					
		}
		?>
        <li><a href="udruge.php">Associations</a></li>
        <li><a href="o_autoru.html">Author</a></li>
	<?php
	if($aktivni_korisnik_tip!=-1){
		echo '<li><a href="logout.php">Logout</a></li>';
	}
	?>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
					<?php
	  if(!isset($_SESSION['aktivni_korisnik'])){
		  ?>
		<h3>Prijava</h3>
        <form method="POST" action="login.php" id="login_form" onsubmit="return CheckValidationInputs('login_form')">
          <p>
            <input class="search" type="text" name="username" id="username" placeholder="Username....." />
            <input class="search" type="password" name="password" id="password" placeholder="Password....." />
            <input class="search" name="loginenter" type="submit" style="border: 1;" src="images/login_2.png" alt="Login" value="Login" />
          </p>
		  <label id = "poruka">
					<?php
					if(isset($_SESSION["poruka"])){
						echo $_SESSION["poruka"];
						unset($_SESSION["poruka"]);
					}
					?>
		</label>
        </form>
		<?php
	  }
	  else
	  {
		  echo "<strong>You are: </strong>".$_SESSION['aktivni_korisnik'].", User type: ".$tip;
		  echo '<h4><a href="korisnik.php?korisnik=' . $_SESSION["aktivni_korisnik_id"] . '">Edit my information</a><h4>';
	  }
	  
	  include("desniprikaz.php");
	  ?>
        
      </div>