var inputLogin, inputPassword, login, password;

window.onload = function() {
	inputLogin=document.getElementById("login");
	inputPassword=document.getElementById("password");
};

function logUser() {
	login=inputLogin.value;
	password=inputPassword.value;
	window.location.href = 'php/userLogin.php?l='+login+'&p='+password;
}