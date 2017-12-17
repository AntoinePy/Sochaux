/**
 * Created by ANTOINE on 12/12/2017.
 */


function activListChampionnat(numeroListe, idNation){
    switch (numeroListe) {
        case 1:
            document.getElementById("championnat1").disabled = document.getElementById("nation1").value === "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("championnat1").innerHTML = xmlhttp.responseText;
                }
            };
        break;
        case 2:
            document.getElementById("championnat2").disabled = document.getElementById("nation2").value === "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("championnat2").innerHTML = xmlhttp.responseText;
                }
            };
        break;
    }
    xmlhttp.open("GET", "../traitementPHP/remplissageListeChampionnat.php?idNation=" + idNation, true);
    xmlhttp.send();
}

function activListClub(numeroListe, idChampionnat){
    switch (numeroListe) {
        case 1:
            document.getElementById("club1").disabled = document.getElementById("championnat1").value === "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("club1").innerHTML = xmlhttp.responseText;
                }
            };
            break;
        case 2:
            document.getElementById("club2").disabled = document.getElementById("championnat2").value === "";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("club2").innerHTML = xmlhttp.responseText;
                }
            };
            break;
    }
    xmlhttp.open("GET", "../traitementPHP/remplissageListeClub.php?idChampionnat=" + idChampionnat, true);
    xmlhttp.send();
}
