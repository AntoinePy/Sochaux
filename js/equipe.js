function choixClub(numeroListe, idClub) {
    activNomClub(numeroListe, idClub);
    //activListeJoueur(numeroListe, idClub);
}

function activNomClub(numeroListe, idClub){
    switch (numeroListe) {
        case 1:
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("nomEquipe1").innerText = xmlhttp.responseText;
                    document.getElementById("domicile").innerText = xmlhttp.responseText;
                }
            };
            break;
        case 2:
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("nomEquipe2").innerText = xmlhttp.responseText;
                    document.getElementById("exterieur").innerText = xmlhttp.responseText;
                }
            };
            break;
    }
    xmlhttp.open("GET", "../traitementPHP/remplissageNomClub.php?idClub=" + idClub, true);
    xmlhttp.send();
}

function activListeJoueur(numeroListe, idClub) {
    switch (numeroListe) {
        case 1:

            break;
        case 2:

            break;
    }
    xmlhttp.open("GET", "../traitementPHP/remplissageListeJoueur.php?idClub=" + idClub, true);
    xmlhttp.send();
}