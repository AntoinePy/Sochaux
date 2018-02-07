function activListClub(numeroListe, idChampionnat){
    //alert(idChampionnat);
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