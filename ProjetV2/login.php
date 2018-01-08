<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>FCSM</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 offset-sm-5" id="logo">
				<img class="img-fluid" src="assets/images/fcsm.png">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="identificationForm">
				Nom de compte:<br>
				<input type="text" name="login" id="login">
				<br>
				Mot de passe:<br>
				<input type="password" name="password" id="password"><br>
				<br>
				<input class="btn btn-primary" type="submit" name="valider" value="Connexion" onclick="logUser()">
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="js/login.js"></script>
</html>