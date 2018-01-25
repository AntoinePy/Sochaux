var listeNations ,listeChampionnats1,listeChampionnats2, listeClubs1,listeClubs2, listeFormations1, listeFormations2, listeJoueursClub1, listeJoueursClub2;
var inputNation1, inputNation2, inputChampion1, inputChampion2, inputClub1, inputClub2;
var valueNation1, valueNation2, valueChampion1, valueChampion2, valueCLub1, valueCLub2;
var idNation1, idNation2, idChampion1, idChampion2, idClub1, idClub2, idFormation1, idFormation2;
var clubValide1, clubValide2;

window.onload = function() {
	listeNations=document.getElementById("nationList");
    listeChampionnats1=document.getElementById("championList1");
    listeChampionnats2=document.getElementById("championList2");
    listeClubs1=document.getElementById("clubList1");
    listeClubs2=document.getElementById("clubList2");
    listeJoueursClub1=document.getElementById("club1PlayersList");
    listeJoueursClub2=document.getElementById("club2PlayersList");
    listeFormations1=document.getElementById("formationSelect1");
    listeFormations2=document.getElementById("formationSelect2");

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
    getFormations();
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
    setTimeout(updateNation1,500);
    setTimeout(updateNation2,500);
}

function getFormations() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeFormations1.innerHTML = this.responseText;
            listeFormations2.innerHTML = this.responseText;
            formationSelect1.selectedIndex="1";
            formationSelect2.selectedIndex="1";
            updatePlayersPlace(1);
            updatePlayersPlace(2);  
        }
    };
    xmlhttp.open("GET","php/getFormations.php?q=",true);
    xmlhttp.send();
}

function updatePlayersPlace(ClubNumber){
    if (ClubNumber==1) {
        idFormation1=formationSelect1.value;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("playersClub1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php/getPositions.php?q="+idFormation1+"&r="+ClubNumber,true);
        xmlhttp.send();
    }
    else{
        idFormation2=formationSelect2.value;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("playersClub2").innerHTML = this.responseText;
                
            }
        };
        xmlhttp.open("GET","php/getPositions.php?q="+idFormation2+"&r="+ClubNumber,true);
        xmlhttp.send();
    }
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
    		getChampionnats(idNation1,1);
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
            getChampionnats(idNation2,2);
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
        e.preventDefault();
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
        setTimeout(getNations,500);
	}
}
function addNation2(e) {
    if ((e.keyCode==13)&&(inputChampion2.disabled==true) ) {
        e.preventDefault();
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
        setTimeout(getNations,500);
    }
}

function getChampionnats(idNat,natNumber) {
    var listeChampionnats;
    if (natNumber==1) {
        listeChampionnats=listeChampionnats1;
    }
    else{
        listeChampionnats=listeChampionnats2;
    }
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(listeChampionnats);
            listeChampionnats.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","php/getChampionnats.php?q="+idNat,true);
    xmlhttp.send();
    if (natNumber==1) {
        setTimeout(updateChampion1,500);
    }
    else{
        setTimeout(updateChampion2,500);
    }
}

function updateChampion1() {
    console.log("hey");
	valueChampion1=inputChampion1.value;
    var enabled=false;
    if (listeChampionnats1.options.length==0) {
        inputChampion1.style.backgroundColor="red";
        inputClub1.disabled = true;
    }
    for (var i = 0; i < listeChampionnats1.options.length; i++) {
    	if (listeChampionnats1.options[i].value==valueChampion1) {
    		enabled=true;
    		inputClub1.disabled = false;
    		inputChampion1.style.backgroundColor="green";
    		idChampion1=listeChampionnats1.options[i].dataset.value;
    		getClubs(idChampion1,1);
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
    console.log("ok");
    var enabled=false;
    if (listeChampionnats2.options.length==0) {
        inputChampion2.style.backgroundColor="red";
        inputClub2.disabled = true;
    }
    for (var i = 0; i < listeChampionnats2.options.length; i++) {
        if (listeChampionnats2.options[i].value==valueChampion2) {
            enabled=true;
            inputClub2.disabled = false;
            inputChampion2.style.backgroundColor="green";
            idChampion2=listeChampionnats2.options[i].dataset.value;
            getClubs(idChampion2,2);
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
        e.preventDefault();
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
        setTimeout(function(){getChampionnats(idNation1,1);},500);
    	//getChampionnats(idNation1);
	}
}

function addChampion2(e) {
    if ((e.keyCode==13)&&(inputClub2.disabled==true) ) {
        e.preventDefault();
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
        setTimeout(function(){getChampionnats(idNation2,2);},500);
    }
}

function getClubs(idChamp,numChamp) {
    var listeClubs;
    if (numChamp==1) {
        listeClubs=listeClubs1;
    }
    else{
        listeClubs=listeClubs2;
    }
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listeClubs.innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","php/getClubs.php?q="+idChamp,true);
    xmlhttp.send();
    if (numChamp==1) {
        setTimeout(updateClub1,500);
    }
    else{
        setTimeout(updateClub2,500);
    }
    
}

function updateClub1() {
	valueClub1=inputClub1.value;
    clubValide1=false;
    if (listeClubs1.options.length==0) {
        console.log("ici");
        inputClub1.style.backgroundColor="red";
        for (var i = 0; i < 11; i++) {
            document.getElementsByClassName('positionClub1')[i].disabled=true;
        }
    }
    for (var i = 0; i < listeClubs1.options.length; i++) {
    	if (listeClubs1.options[i].value==valueClub1) {
    		clubValide1=true;
    		inputClub1.style.backgroundColor="green";
    		idClub1=listeClubs1.options[i].dataset.value;
            for (var i = 0; i < 11; i++) {
                document.getElementsByClassName('positionClub1')[i].disabled=false;
                document.getElementsByClassName('positionClub1')[i].style.backgroundColor="red";
            }
            getJoueurs(idClub1,1);
            console.log("ok");
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
    if (listeClubs2.options.length==0) {
        inputClub2.style.backgroundColor="red";
        for (var i = 0; i < 11; i++) {
            document.getElementsByClassName('positionClub2')[i].disabled=true;
            document.getElementsByClassName('positionClub1')[i].style.backgroundColor="red";
        }
    }
    for (var i = 0; i < listeClubs2.options.length; i++) {
        if (listeClubs2.options[i].value==valueClub2) {
            clubValide2=true;
            inputClub2.style.backgroundColor="green";
            idClub2=listeClubs2.options[i].dataset.value;
            for (var i = 0; i < 11; i++) {
                document.getElementsByClassName('positionClub2')[i].disabled=false;
            }
            getJoueurs(idClub2,2);
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
        e.preventDefault();
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
        setTimeout(function(){getClubs(idChampion1,1);},500);
	}
}

function addClub2(e) {
    if ((e.keyCode==13)&&(clubValide2==false) ) {
        e.preventDefault();
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
        setTimeout(function(){getClubs(idChampion2,2);},500);
    }
}

function getJoueurs(idCLub,numClub) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (numClub==1) {
                listeJoueursClub1.innerHTML = this.responseText;
            }
            else if (numClub==2) {
                listeJoueursClub2.innerHTML = this.responseText;
            }
            
        }
    };
    if (numClub==1) {

    }
    xmlhttp.open("GET","php/getJoueurs.php?q="+idCLub,true);
    xmlhttp.send();
}

function updatePlayers(id,numClub) {
    var valueName=document.getElementById(id).value;
    var joueurValide=false;
    var clubJoueur;
    var listeJoueur;
    if (numClub==1) {
        clubJoueur==idClub1;
        listeJoueur=listeJoueursClub1
    }
    else{
        clubJoueur==idClub2;
        listeJoueur=listeJoueursClub2
    }
    for (var i = 0; i < listeJoueur.options.length; i++) {
        if (listeJoueur.options[i].value==valueName) {
            joueurValide=true;
            document.getElementById(id).style.backgroundColor="green";
            console.log("ok");
        }
        else{
            if (!joueurValide) {
                document.getElementById(id).style.backgroundColor="red";
            }
        }
    }

}


function addPlayer(e, id, numCLub) {
    var elt=document.getElementById(id);
    var nomJoueur=elt.value;
    console.log(nomJoueur);
    var clubJoueur;
    if ((e.keyCode==13)&&(elt.style.backgroundColor=="red") ) {
        e.preventDefault();
        var noms=nomJoueur.split(" ");
        if (numCLub==1) {
            clubJoueur=idClub1;
        }
        else if (numCLub==2) {
            clubJoueur=idClub2;
        }
        if (confirm("Ajouter le joueur "+noms[0]+" "+noms[1]+"?") == true) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                console.log("réeussi");
            };
            xmlhttp.open("GET","php/addJoueur.php?prenom="+noms[0]+"&famille="+noms[1]+"&club="+clubJoueur,true);
            xmlhttp.send();
            
        }
        else {
            console.log("non validé");
        }
        setTimeout(function(){getJoueurs(clubJoueur,numCLub);setTimeout(function(){updatePlayers(id,numCLub);},500);},500);
        
    }
}