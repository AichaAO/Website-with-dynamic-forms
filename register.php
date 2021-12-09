
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
      		
      			<div class="signup"><a href="register.php">S'inscrire</a></div>
      			<div class="login" style="background-color:transparent;" ><a href="login_file.php">Se connecter</a></div>
      
       			<div class="signup-form"  >
        			<form method="post" action="essai.php">
          			  <input type="text" placeholder="Votre Prenom" class="input" name="first_name">
			          <input type="text" placeholder="Votre NOM" class="input" name="family_name">
			          <input type="email" placeholder="exemple@xyz.com" class="input" name="email_add">
			          <input type="password" placeholder="Mot de passe " class="input" name="password">
			          <input type="password" placeholder="Confirmer votre mot de passe " class="input" name="password2">
			          <b>Profil:  </b> <input type="radio" name="profil" value="administratif" checked>Administratif
			  		  <input type="radio" name="profil" value="enseignant"> Enseignant<br><br>  
          			  <input class="btn" type="submit" name="register_btn" value="s'inscrire">
      			   </form>
       			</div>
     
    	</div>
  	</div>
  	</div>

</body>
</html>