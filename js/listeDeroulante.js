/**
 * Created by ANTOINE on 12/12/2017.
 */

function activListChampionnat(){
    document.getElementById("championnat").disabled = document.getElementById("nation").value === "";
}

function activListClub(){
    document.getElementById("club").disabled = document.getElementById("championnat").value === "";
}

$('#nation').on('change',function(){

    $('#champ').attr('disabled',false);
});

$('#champ').on('change',function(){

    $('#club').attr('disabled',false);
});