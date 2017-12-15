/**
 * Created by ANTOINE on 12/12/2017.
 */

function activListChampionnat(){
    document.getElementById("championnat1").disabled = document.getElementById("nation1").value === "";
}

function activListClub(){
    document.getElementById("club1").disabled = document.getElementById("championnat1").value === "";
}

