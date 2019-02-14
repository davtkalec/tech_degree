




function DisableDates(){
		
		if(document.getElementById("naziv").value!=""){
		document.getElementById("datumOd").disabled = true;
		document.getElementById("datumDo").disabled = true;
		}
		else
		{
		document.getElementById("datumOd").disabled = false;
		document.getElementById("datumDo").disabled = false;	
		}

		
	}
	
	function DisableNaziv(){
		
		if(document.getElementById("datumOd").value!="" || document.getElementById("datumDo").value!=""){
		document.getElementById("naziv").disabled = true;	
		}
		else
		{
			document.getElementById("naziv").disabled = false;
		}
	}

	function Odabranih(){
		var koliko = 0;
		var popis = document.getElementById("sudionici").options;

		for (var i=0; i < popis.length; i++) {
		if (popis[i].selected) koliko++;
		}
		document.getElementById("odabranih").innerHTML = "Selected in total: "+koliko;
	}
	
function CheckValidationInputs(formid){
	
	var greske="";
	var pronadjeno=0;
	
	
		if(formid=="login_form"){
		
		var korisnik = document.getElementById("username");
		var lozinka = document.getElementById("password");
		
		if(korisnik.value==""){
			greske+="<br>You didn't enter a username!";
			pronadjeno++;
		}
		
		if(lozinka.value==""){
			greske+="<br>You didn't enter a password!";
			pronadjeno++;
		}
						
	}
	
	
	
	if(formid=="korisnikpretraga"){
		
		var naz = document.getElementById("ime");
		if(naz.value==""){

			greske+="<br>Search: You didn't enter a name!";
			pronadjeno++;
		}
		
		var tip = document.getElementsByName('tip[]');
			
		var odabranih=0;
		for(var a=0;a<tip.length;a++){
			
			if(tip[a].checked==true){
				odabranih++;
			}
		}
		
		if(odabranih==0){
			greske+="<br>Search: You didn't enter a type!";
			pronadjeno++;
		}
		
	}
	
	
	if(formid=="udruga"){
		
		var naz = document.getElementById("naziv");
		if(naz.value==""){
			greske+="<br>You didn't enter a name!";
			pronadjeno++;
		}
		
		var opis = document.getElementById("opis");
		if(opis.value==""){
			greske+="<br>You didn't enter a description!";
			pronadjeno++;
		}
						
	}
	
	
	if(formid=="aktivnost"){
		
		var naz = document.getElementById("naziv");
		if(naz.value==""){
			greske+="<br>You didn' enter a name of an activity!";
			pronadjeno++;
		}
		
		var datum = document.getElementById("dat_odrzavanja");
		if(datum.value==""){
			greske+="<br>You didn't enter a date!";
			pronadjeno++;
		}
		
		var vrijeme = document.getElementById("vrijeme_odrzavanja");
		if(vrijeme.value==""){
			greske+="<br>You didn't enter a time!";
			pronadjeno++;
		}
		
		var koliko = 0;
		var popis = document.getElementById("sudionici").options;

		for (var i=0; i < popis.length; i++) {
		if (popis[i].selected) 
			koliko++;
		}
		
		if(koliko==0){
			greske+="<br>You didn't enter a user!";
			pronadjeno++;			
		}
						
	}
	
	
	if(formid == "korisnik"){
		
		var korime = document.getElementById("kor_ime");
		if(korime.value==""){
			greske+="<br>You didn't enter a username!";
			pronadjeno++;
		}
		

		var ime = document.getElementById("ime");
		if(ime.value==""){
			greske+="<br>You didn't enter a name!";
			pronadjeno++;
		}
		
		var prezime = document.getElementById("prezime");
		if(prezime.value==""){
			greske+="<br>You didn't enter a username!";
			pronadjeno++;
		}
		
		var lozinka = document.getElementById("lozinka");
		if(lozinka.value==""){
			greske+="<br>You didn't enter a password!";
			pronadjeno++;
		}
		
		var tip = document.getElementById("tip");
		if(tip.value=="odb"){
			greske+="<br>You didn't enter a type!";
			pronadjeno++;
		}
		
		var email = document.getElementById("email");
		if(email.value==""){
			greske+="<br>You didn't enter an e-mail!";
			pronadjeno++;
		}	
	}	
	
	if(pronadjeno>0){
		
		document.getElementById("poruka").innerHTML="<p>The search found "+pronadjeno+" errors:</p>";
		document.getElementById("poruka").innerHTML+=greske;
		
		return false;
	}
	
	return true;
	

}