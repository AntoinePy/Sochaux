<?php
include 'php/checkSession.php';
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Feuille de Match</title>
	<link rel="icon" type="image/png" href="assets/images/fcsm.png" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/feuillematchstyle.css">
	<link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-ui.js"></script>
</head>
<body>
<form action="commentaireJoueur.php" method="post">
<div class="container-fluid">
	<div class="row">
		<?php include 'navbar.php'; ?>
		<div class="col-sm-10">
			
			<div class="row">
				<div class="col-sm-8">
                    <div class="row">
                        <h1>
                            Informations match
                        </h1>
                    </div>
                    <div class="row inputSelection">
                        <div class="col-sm-6">
                            <table>
                                <tr><td>Lieu: </td><td><input type="text" name="lieuMatch" id="inputLieuMatch"></td></tr>
                                <tr><td>Date du match: </td><td><input type="date" name="dateMatch" id="inputDateMatch"></td></tr>
                                <tr><td>Auteur du rapport: </td><td><input type="text" name="auteurMatch" id="inputAuteurMatch"></td></tr>
                                <tr><td>Tournoi: </td><td><input type="text" name="tournoiMatch" id="inputTournoiMatch" list="tournoiList" oninput="updateTournoi()" onkeypress="return addTournoi(event)"></td></tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table>
                                <tr><td>Condition du match: </td></tr>
                                <tr><td><textarea name="conditionMatch" id="textAreaConditionMatch"></textarea></td></tr>
                                <tr><td>Commentaire sur le match: </td></tr>
                                <tr><td><textarea name="commentaireMatch" id="commentaireMatch"></textarea></td></tr>
                            </table>
                        </div>
                    </div>
					<div class="row">
						<h1>	
							Feuille de Match
						</h1>
					</div>
					<div class="row inputSelection">
						<div class="col-sm-6 selectionClub">
							Nation: <input type="text" name="nation1" id="inputNation1" list="nationList" oninput="updateNation1()" onkeypress="return addNation1(event)"><br><br>
							Championnat: <input type="text" name="champion1" id="inputChampion1" list="championList1" oninput="updateChampion1()" onkeypress="return addChampion1(event)" disabled><br><br>
							Club: <input type="text" name="club1" id="inputClub1" list="clubList1" oninput="updateClub1()" onkeypress="return addClub1(event)" disabled><br><br>
							Formation: <select id="formationSelect1" class="formSelect" onchange="updatePlayersPlace(1)""></select><br><br>
							<div id="playersClub1"></div>
						</div>
						<div class="col-sm-6 selectionClub">
							Nation: <input type="text" name="nation2" id="inputNation2" list="nationList" oninput="updateNation2()" onkeypress="return addNation2(event)"><br><br>
							Championnat: <input type="text" name="champion2" id="inputChampion2" list="championList2" oninput="updateChampion2()" onkeypress="return addChampion2(event)" disabled><br><br>
							Club: <input type="text" name="club2" id="inputClub2" list="clubList2" oninput="updateClub2()" onkeypress="return addClub2(event)" disabled><br><br>
							Formation: <select id="formationSelect2" class="formSelect" onchange="updatePlayersPlace(2)"></select><br><br>
							<div id="playersClub2"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<img src="assets/images/terrain.png" class="img-fluid" id="terrain">
				</div>

                <datalist id="tournoiList"></datalist>
				<datalist id="clubList1"></datalist>
				<datalist id="clubList2"></datalist>
				<datalist id="nationList"></datalist>
				<datalist id="championList1"></datalist>
				<datalist id="championList2"></datalist>
				<datalist id="club1PlayersList"></datalist>
				<datalist id="club2PlayersList"></datalist>

			</div>
            <input type="submit" value="Valider" class="btn btn-primary homebutton" id="btnCommentaire"/>
		</div>
	</div>
	
</div>
</form>
<script type="text/javascript" src="js/listesDeroulantes.js"></script>
</body>
</html>