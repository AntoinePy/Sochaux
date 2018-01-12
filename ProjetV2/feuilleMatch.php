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
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<?php include 'navbar.php'; ?>
		<div class="col-sm-10">
			
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
						<h1>	
							Feuille de Match
						</h1>
					</div>
					<div class="row inputSelection">
						<div class="col-sm-6 selectionClub">
							Nation: <input type="text" name="nation1" id="inputNation1" list="nationList" oninput="updateNation1()" onkeypress="return addNation1(event)"><br>
							Championnat: <input type="text" name="champion1" id="inputChampion1" list="championList" oninput="updateChampion1()" onkeypress="return addChampion1(event)" disabled><br>
							Club: <input type="text" name="club1" id="inputClub1" list="clubList" oninput="updateClub1()" onkeypress="return addClub1(event)" disabled><br>
							Formation: <select id="formationSelect1" class="formSelect" onchange="updatePlayersPlace(1)""></select>
							<div id="playersClub1"></div>

						</div>
						<div class="col-sm-6 selectionClub">
							Nation: <input type="text" name="nation2" id="inputNation2" list="nationList" oninput="updateNation2()" onkeypress="return addNation2(event)"><br>
							Championnat: <input type="text" name="champion2" id="inputChampion2" list="championList" oninput="updateChampion2()" onkeypress="return addChampion2(event)" disabled><br>
							Club: <input type="text" name="club2" id="inputClub2" list="clubList" oninput="updateClub2()" onkeypress="return addClub2(event)" disabled><br>
							Formation: <select id="formationSelect2" class="formSelect" onchange="updatePlayersPlace(2)"></select>
							<div id="playersClub2"></div>

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<img src="assets/images/terrain.png" class="img-fluid" id="terrain">
				</div>
				<datalist id="clubList"></datalist>
				<datalist id="nationList"></datalist>
				<datalist id="championList"></datalist>
				<datalist id="club1PlayersList"></datalist>
				<datalist id="club2PlayersList"></datalist>

			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript" src="js/listesDeroulantes.js"></script>
</body>
</html>