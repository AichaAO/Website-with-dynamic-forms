
<!DOCTYPE html>
<html>
<head>
	<title> welcome</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<br>
<header>
		<img src="inpt.png" alt="inpt logo" style="float:left;width:170px;height:70px;margin-left:10px;margin-top:5px;">
		<img src="anrt.png" alt="anrt logo" style="float:right;width:170px;height:70px;margin-right:10px;margin-top:5px;" >
		<h1 style="text-align:center; color:#b1cdcd; font-family:Georgia;text-shadow:2px 2px 4px #334d4d;">Bienvenue dans la plateforme de candidature</h1>

</header>
<br><br>
	<div class="login-box">

		<div class="wrapper">
    		<div class="container">
      			<div class="login" ><a href="login_file.php">Se connecter</a></div>
      			<div class="signup" style="background-color:transparent;"><a href="register.php">S'inscrire</a></div>
      			<div class="login-form">
      				<form action="login_php.php" method="post">
				          <input type="text" placeholder="votre adresse mail " class="input" name="adr_mail"><br />
				          <input type="password" placeholder="mot de passe " class="input" name="password"><br />
				           <b>Profil:  </b> <input type="radio" name="profil" value="administratif" checked>Administratif
				 		  <input type="radio" name="profil" value="enseignant"> Enseignant<br><br>
				          <input class="btn" type="submit" name="login_btn" value="se connecter :">
				          
       				</form>
       			</div>
     
    	</div>
  	</div>
  	</div>

</body>
</html>
