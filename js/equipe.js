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
    activListeJoueur(numeroListe, idClub);
}

function activListeJoueur(numeroListe, idClub) {
    alert('activListeJoueur');
    switch (numeroListe) {
        case 1:
            for(i = 1; i <= 11; i++) {
                document.getElementById("player" + i).disabled = document.getElementById("club1").value === "";
            }
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    for(i = 1; i <= 11; i++) {
                        document.getElementById("player" + i).innerHtml = xmlhttp.responseText;
                    }
                }
            };
            break;
        case 2:
            for(i = 1; i <= 11; i++) {
                document.getElementById("joueur" + i).disabled = document.getElementById("club2").value === "";
            }
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    for(i = 1; i <= 11; i++) {
                        document.getElementById("joueur" + i).innerHtml = xmlhttp.responseText;
                    }
                }
            };
            break;
    }
    xmlhttp.open("GET", "../traitementPHP/remplissageListeJoueur.php?idClub=" + idClub, true);
    xmlhttp.send();
}