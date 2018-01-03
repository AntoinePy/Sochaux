var listeNations, inputNations, valueNations, listeChampionnats, inputChampionnats, valueChampionnats, listeClubs, inputClubs, valueClubs, clubValide, idNation, idChampionnat, idClub;
window.onload = function() {
	listeNations=document.getElementById("nationsDataList");
	inputNations=document.getElementById("inputNations");
	listeChampionnats=document.getElementById("championnatsDataList");
	inputChampionnats=document.getElementById("inputChampionnats");
	listeClubs=document.getElementById("clubsDataList");
	inputClubs=document.getElementById("inputClubs");
	inputNations.value="";
	inputChampionnats.value="";
	inputClubs.value="";
	inputChampionnats.disabled=true;
	inputClubs.disabled=true;
	getNations();

};

function getNations() {

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeNations.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","getNations.php?q=",true);
    xmlhttp.send();
}

function updateNations() {
	var enabled=false;
    valueNations=inputNations.value;
    for (var i = 0; i < listeNations.options.length; i++) {
    	if (listeNations.options[i].value==valueNations) {
    		enabled=true
    		inputChampionnats.disabled = false;
    		idNation=listeNations.options[i].dataset.value;
    		inputNations.style.backgroundColor="green";
    		getChampionnats();
    	}
    	else{
    		if (!enabled) {
    			inputNations.style.backgroundColor="red";
    			inputChampionnats.disabled = true;
    		}
    	}
    }
}

function addNation(e) {
	if ((e.keyCode==13)&&(inputChampionnats.disabled==true) ) {
		if (confirm("Ajouter la nation "+valueNations+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","addNation.php?q="+valueNations,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getNations();
	}
}

function getChampionnats() {
	valueNations=inputNations.value;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeChampionnats.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","getChampionnats.php?q="+idNation,true);
    xmlhttp.send();

    
}

function updateChampionnats() {
	valueChampionnats=inputChampionnats.value;
    var enabled=false;
    for (var i = 0; i < listeChampionnats.options.length; i++) {
    	if (listeChampionnats.options[i].value==valueChampionnats) {
    		enabled=true;
    		inputClubs.disabled = false;
    		inputChampionnats.style.backgroundColor="green";
    		idChampionnat=listeChampionnats.options[i].dataset.value;
    		getClubs();
    	}
    	else{
    		if (!enabled) {
    		inputChampionnats.style.backgroundColor="red";
    			inputClubs.disabled = true;
    		}
    	}
    }
}

function addChampionnat(e) {
	if ((e.keyCode==13)&&(inputClubs.disabled==true) ) {
		if (confirm("Ajouter le championnat "+valueChampionnats+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","addChampionnat.php?q="+valueChampionnats+"&n="+idNation,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getChampionnats();
	}
}

function getClubs() {
	valueChampionnats=inputChampionnats.value;
    xmlhttp = new XMLHttpRequest();
    var listeClubs=document.getElementById("clubsDataList");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeClubs.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","getClubs.php?q="+idChampionnat,true);
    xmlhttp.send();
}

function updateClubs() {
	valueClubs=inputClubs.value;
    clubValide=false;
    for (var i = 0; i < listeClubs.options.length; i++) {
    	if (listeClubs.options[i].value==valueClubs) {
    		clubValide=true;
    		inputClubs.style.backgroundColor="green";
    		idClub=listeClubs.options[i].dataset.value;
    	}
    	else{
    		if (!clubValide) {
    			inputClubs.style.backgroundColor="red";
    		}
    	}
    }
}

function addClub(e) {
	if ((e.keyCode==13)&&(clubValide==false) ) {
		if (confirm("Ajouter le club "+valueClubs+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","addClub.php?q="+valueClubs+"&n="+idChampionnat,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getClubs();
	}
}