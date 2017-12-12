/**
 * Created by ANTOINE on 12/12/2017.
 */
function activListChampionnat(){
    if(document.getElementById("nation").value != "") {
        document.getElementById("championnat").disabled = false;
    }else{
        document.getElementById("championnat").disabled = true;
    }

}
function activListClub(){
    if(document.getElementById("championnat").value != "") {
        document.getElementById("club").disabled = false;
    }else{
        document.getElementById("club").disabled = true;
    }

}