var listeNations ,listeChampionnats, listeClubs;
var inputNation1, inputNation2, inputChampion1, inputChampion2, inputClub1, inputClub2;
var valueNation1, valueNation2, valueChampion1, valueChampion2, valueCLub1, valueCLub2;
var idNation1, idNation2, idChampion1, idChampion2, idClub1, idClub2;
var clubValide1, clubValide2;

window.onload = function() {
	listeNations=document.getElementById("nationList");
    listeChampionnats=document.getElementById("championList");
    listeClubs=document.getElementById("clubList");


    inputNation1=document.getElementById("inputNation1");
	inputNation2=document.getElementById("inputNation2");
    inputChampion1=document.getElementById("inputChampion1");
	inputChampion2=document.getElementById("inputChampion2");
    inputClub1=document.getElementById("inputClub1");
	inputClub2=document.getElementById("inputClub2");


	inputNation1.value="";
	inputChampion1.value="";
	inputClub1.value="";
    inputNation2.value="";
    inputChampion2.value="";
    inputClub2.value="";
	inputChampion1.disabled=true;
	inputClub1.disabled=true;
    inputChampion2.disabled=true;
    inputClub2.disabled=true;
	getNations();

};

function getNations() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeNations.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","php/getNations.php?q=",true);
    xmlhttp.send();
}

function updateNation1() {
	var enabled=false;
    valueNation1=inputNation1.value;
    for (var i = 0; i < listeNations.options.length; i++) {
    	if (listeNations.options[i].value==valueNation1) {
    		enabled=true;
    		inputChampion1.disabled = false;
    		idNation1=listeNations.options[i].dataset.value;
    		inputNation1.style.backgroundColor="green";
    		getChampionnats(idNation1);
    	}
    	else{
    		if (!enabled) {
    			inputNation1.style.backgroundColor="red";
    			inputChampion1.disabled = true;
    		}
    	}
    }
}

function updateNation2() {
    var enabled=false;
    valueNation2=inputNation2.value;
    for (var i = 0; i < listeNations.options.length; i++) {
        if (listeNations.options[i].value==valueNation2) {
            enabled=true;
            inputChampion2.disabled = false;
            idNation2=listeNations.options[i].dataset.value;
            inputNation2.style.backgroundColor="green";
            getChampionnats(idNation2);
        }
        else{
            if (!enabled) {
                inputNation2.style.backgroundColor="red";
                inputChampion2.disabled = true;
            }
        }
    }
}


function addNation1(e) {
	if ((e.keyCode==13)&&(inputChampion1.disabled==true) ) {
		if (confirm("Ajouter la nation "+valueNation1+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","php/addNation.php?q="+valueNation1,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getNations();
	}
}
function addNation2(e) {
    if ((e.keyCode==13)&&(inputChampion2.disabled==true) ) {
        if (confirm("Ajouter la nation "+valueNation2+"?") == true) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                console.log("réeussi");
            };
            xmlhttp.open("GET","php/addNation.php?q="+valueNation2,true);
            xmlhttp.send();
        }
        else {
            console.log("non validé");
        }
        getNations();
    }
}

function getChampionnats(idNat) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeChampionnats.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","php/getChampionnats.php?q="+idNat,true);
    xmlhttp.send();

    
}

function updateChampion1() {
	valueChampion1=inputChampion1.value;
    var enabled=false;
    for (var i = 0; i < listeChampionnats.options.length; i++) {
    	if (listeChampionnats.options[i].value==valueChampion1) {
    		enabled=true;
    		inputClub1.disabled = false;
    		inputChampion1.style.backgroundColor="green";
    		idChampion1=listeChampionnats.options[i].dataset.value;
    		getClubs(idChampion1);
    	}
    	else{
    		if (!enabled) {
                inputChampion1.style.backgroundColor="red";
    			inputClub1.disabled = true;
    		}
    	}
    }
}

function updateChampion2() {
    valueChampion2=inputChampion2.value;
    var enabled=false;
    for (var i = 0; i < listeChampionnats.options.length; i++) {
        if (listeChampionnats.options[i].value==valueChampion2) {
            enabled=true;
            inputClub2.disabled = false;
            inputChampion2.style.backgroundColor="green";
            idChampion2=listeChampionnats.options[i].dataset.value;
            getClubs(idChampion2);
        }
        else{
            if (!enabled) {
                inputChampion2.style.backgroundColor="red";
                inputClub2.disabled = true;
            }
        }
    }
}

function addChampion1(e) {
	if ((e.keyCode==13)&&(inputClub1.disabled==true) ) {
		if (confirm("Ajouter le championnat "+valueChampion1+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","php/addChampionnat.php?q="+valueChampion1+"&n="+idNation1,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getChampionnats(idNation1);
	}
}

function addChampion2(e) {
    if ((e.keyCode==13)&&(inputClub2.disabled==true) ) {
        if (confirm("Ajouter le championnat "+valueChampion2+"?") == true) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                console.log("réeussi");
            };
            xmlhttp.open("GET","php/addChampionnat.php?q="+valueChampion2+"&n="+idNation2,true);
            xmlhttp.send();
        }
        else {
            console.log("non validé");
        }
        getChampionnats(idNation2);
    }
}

function getClubs(idChamp) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeClubs.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","php/getClubs.php?q="+idChamp,true);
    xmlhttp.send();
}

function updateClub1() {
	valueClub1=inputClub1.value;
    clubValide1=false;
    for (var i = 0; i < listeClubs.options.length; i++) {
    	if (listeClubs.options[i].value==valueClub1) {
    		clubValide1=true;
    		inputClub1.style.backgroundColor="green";
    		idClub1=listeClubs.options[i].dataset.value;
    	}
    	else{
    		if (!clubValide1) {
    			inputClub1.style.backgroundColor="red";
    		}
    	}
    }
}

function updateClub2() {
    valueClub2=inputClub2.value;
    clubValide2=false;
    for (var i = 0; i < listeClubs.options.length; i++) {
        if (listeClubs.options[i].value==valueClub2) {
            clubValide2=true;
            inputClub2.style.backgroundColor="green";
            idClub2=listeClubs.options[i].dataset.value;
        }
        else{
            if (!clubValide2) {
                inputClub2.style.backgroundColor="red";
            }
        }
    }
}

function addClub1(e) {
	if ((e.keyCode==13)&&(clubValide1==false) ) {
		if (confirm("Ajouter le club "+valueClub1+"?") == true) {
        	xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		        console.log("réeussi");
		    };
		    xmlhttp.open("GET","php/addClub.php?q="+valueClub1+"&n="+idChampion1,true);
		    xmlhttp.send();
    	}
    	else {
    		console.log("non validé");
    	}
    	getClubs(idChampion1);
	}
}

function addClub2(e) {
    if ((e.keyCode==13)&&(clubValide2==false) ) {
        if (confirm("Ajouter le club "+valueClub2+"?") == true) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                console.log("réeussi");
            };
            xmlhttp.open("GET","php/addClub.php?q="+valueClub2+"&n="+idChampion2,true);
            xmlhttp.send();
        }
        else {
            console.log("non validé");
        }
        getClubs(idChampion2);
    }
}