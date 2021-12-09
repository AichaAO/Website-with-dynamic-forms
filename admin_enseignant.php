<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil Enseignant-Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="formulaire1.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="affi1()">
	<header >
		<img src="inpt.png" alt="inpt logo" style="float:left;width:170px;height:70px;margin-left:10px;margin-top:5px;">
		<img src="anrt.png" alt="anrt logo" style="float:right;width:170px;height:70px;margin-right:10px;margin-top:5px;" >
		<h1 style="text-align:center; color:#b1cdcd; font-family:Georgia;text-shadow:2px 2px 4px #334d4d;"><i style="font-size:50px;color:#336699;text-shadow:2px 2px 4px #334d4d;" class='fas'>&#xf4ff;</i>Espace d'administration</h1>

	</header>

	<nav > 
		<a href="logout.php"><i onmouseover="mOver(this)" onmouseout="mOut(this)" style="font-size:35px;color:#001a33;text-shadow:2px 2px 4px #334d4d;margin-left:20px;" class='fas'>&#xf2f5;</i></a>

		<b style="font-size:20px;color:#001a33;margin-left:500px;text-shadow:2px 2px 4px #334d4d;">N° de candidature </b> 
		<i style="font-size:35px;color:#001a33;text-shadow:2px 2px 4px #334d4d;" class='far'> &#xf15c;</i>
	
        <b style="font-size:20px;color:#001a33;margin-left:340px;text-shadow:2px 2px 4px #334d4d;">Prénom NOM</b> 
		<i style="font-size:35px;color:#001a33;text-shadow:2px 2px 4px #334d4d;" class='fas'> &#xf2bd;</i>

	</nav>


	<div class="form1_div">


		<!-- ############################## Page d'acceuil#########################################-->
		<div class="form_zone" id="page_acceuil">
			<br>
			<p>
				<center><h4><b> BIENVENUE DANS L'ESPACE DE GESTION DU PROFIL ENSEIGNANT </h4></b></center>
			</p>
			<br>
			
			<b>Veuillez spécifier la date de début et de fin de la postulation de candidature:</b>
			<br><br><br>
			<form action="enseignant_server.php" method="post">
			    	<div class="col-30-left"><b>Date de début :</b><input type="date" id="date_debut" name="date_debut" ></div>
					<div class="col-30-left"><b>Date de fin :</b><input type="date" id="date_fin" name="date_fin" ></div>
					<div class="col-15-left"><input type="submit" value="Ajouter" name="appliquer"></div>
			<br><br><br>
			<input type="submit" value="téléchrger la base de données des candidats 'enseignant' sous format excel" name="database_en">
			
			
			</form>
			
			<br><br><br><br><br><br><br><br>
			<p><b><h4> L'accès à la plateforme est ouvert à partir de <?php echo $_SESSION["date1"]?> , jusqu'à <?php echo $_SESSION["date2"]?></h4> </b></p>
			
			
			
			
		</div>
		<!-- ############################## FIN Page d'acceuil#########################################-->
		
		<!-- ############################## Page renseignement personnel ##################################-->
		
		<div class="form_zone" id="rens_person">  
			<form action="/" method="post">
				<br><br>
				<!-- Le prénom en arabe et en français-->
				<div class="row">
			    	<div class="col-15-left">
			      		<label for="prenom_fr">Prénom <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="prenom_fr" name="firstname_fr" placeholder="Votre prénom...">
			   		</div>


			    	<div class="col-15-right">
			      		<label for="prenom_ar"><span class="req">*</span> الإسم الشخصي</label>
			    	</div>

			    	<div class="col-30-right">
			      		<input type="text" id="prenom_ar" name="firstname_ar" placeholder="...الإسم الشخصي">
			   		 </div>
			  	</div>


			  	<!-- Le nom en arabe et en français-->

			   	<div class="row">
			    	<div class="col-15-left">
			      		<label for="nom_fr">Nom <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="nom_fr" name="lastname_fr" placeholder="votre nom..">
			    	</div>


			    	<div class="col-15-right">
			      		<label for="nom_ar"><span class="req">*</span> الإسم العائلي </label>
			    	</div>

			    	<div class="col-30-right">
			      		<input type="text" id="nom_ar" name="lastname_ar" placeholder="...الإسم العائلي">
			    	</div>
			 	</div>



			 	<!-- LA DATE DE NAISSANCE-->
			  	<div class="row">
			    	<div class="col-15-left">
			      		<label for="date_naissance" >Date de naissance <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="date" id="date_naissance" name="birth_day"  >
			   		</div>


			    	<div class="col-15-left">
			      		<p> <b>Genre</b> <span class="req">*</span></p>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="radio"  name="genre" value="homme"> Homme
			      		<input type="radio"  name="genre" value="femme"> Femme
			   		 </div>
			  	</div>



			    <!-- #################CIN######################-->
			    <div class="row">
			    	<div class="col-15-left">
			      		<label for="cin">CIN <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="cin" name="cin" placeholder="votre numéro de CIN..">
			    	</div>


			    	<div class="col-15-left">
			      		<label for="ville_habite">Votre CIN (PDF)<span class="req">*</span></label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="file" name="cin_pdf">
			   		 </div>
			  	</div>
	    
			   		<input type="submit" value="Enregister">
			</form>


		</div>
		<!-- ############################### FIN Renseignement personel########################################"-->



		<!-- ############################### Détail de contact########################################"-->
		<div class="form_zone" id="detail_contact">  


			<form>
				<br><br>
			    <div class="row">
			    	<div class="col-15-left">
			      		<label for="pays_habite">Pays<span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="pays_habite" name="pays" >
			   		</div>


			    	<div class="col-15-left">
			      		<label for="ville_habite">Ville<span class="req">*</span></label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="ville_habite" name="ville" >
			   		 </div>
			  	</div>




			    <div class="row">
			    	<div class="col-15-left">
			      		<label for="code_post">Code postal <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="code_post" name="code_postal" >
			   		</div>


			    	<div class="col-15-left">
			      		<label for="adresse">Adresse <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="adresse" name="adresse" >
			   		</div>
			  	</div>



			    <div class="row">
			    	<div class="col-15-left">
			      		<label for="tel1"> N° Tel(1) <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="tel1" name="telephone1" >
			   		</div>


			    	<div class="col-15-left">
			      		<label for="prenom_ar"> N° Tel(2) </label>
			    	</div>

			    	<div class="col-30-left">
			      		<input type="text" id="tel2" name="telephone2" >
			   		 </div>
			  	</div>



				<div class="row">
			    	<div class="col-35-left">
			      		<label for="email_address" > Adresse email <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-35-left">
			      		<input type="email" id="email_address" name="email_addr" >
			    	</div>

			    </div>

			    	
				<input type="submit" value="Enregister">
			</form>


		</div>
		<!-- ############################### FIN Détail de contact########################################"-->



		<!-- ############################### Candidature ########################################"-->
	<div class="form_zone" id="enseignement"> 
				<div class="row">
			    	<div class="col-50-left">
			      		<label for="poste_rech" > Le poste: objet de votre candidature : <span class="req">*</span> </label>
			    	</div>
			    </div>

			    <div class="row">
			    <form action="enseignant_server.php" method="post">
			    	<div class="col-30-left"><input type="text" id="txt" name="poste_name" ></div>
					<div class="col-15-left"><input type="submit" value="Ajouter" name="ajouter"></div>
					<div class="col-15-left"><input type="submit" value="Supprimer" name="supprimer"></div>
					
					
				</form>
				</div>
				<br><br>
				<div id="optionListe" >
			<?php foreach ($_SESSION["array_poste1"] as $v){?>
				
			<p><input type="checkbox"  name=<?php echo $v ?> value=<?php echo $v ?>><label onclick="f1(this)" id="poste_rechercher1"><?php echo $v ?></label>
				</p>
	
				
			<?php } ?>
			
				</div>
				
	

		</div>
		<!-- ############################### FIN Candidature########################################"-->




		<!-- ############################### Qualification ########################################"-->
		<div class="form_zone" id="qualification">
			<form>
				<div class="row">
				
				    <p> <h5> <b>Diplôme correspondant au post recherché :</b></h5> </p>
				  
				  <div class="col-14-left">
				    <input type="radio" id="1_d" name="type_diplome1" value="marocain" onclick="maroc_dip()"><b>Diplôme Marocain</b> <br>
				    <input type="radio" id="2_d" name="type_diplome1" value="etranger" onclick="etrang_dip()"><b>Diplôme Etranger</b>
				  </div>

				  <div class="col-9-left">
				    <label for="description_diplome1">Description<span class="req">*</span>:</label>
				  </div>

				  <div class="col-25-left">
				    <input type="text"  name="description_diplome1" placeholder=" Decrivez votre diplôme....">
				  </div>
				  
				  <div class="col-20-left">
				    <label for="pdf_diplome1">Télécharger (Diplôme)<span class="req">*</span>:</label>
				  </div>

				  <div class="col-25-left">
				    <input type="file" name="pdf_diplome1">
				  </div>
				  <div class="col-20-left2" >
				    <label  id="tel11" for="pdf_diplome1_equivalent" >Télécharger (Equivalent)<span class="req">*:</span></label>
				  </div>
				   <div class="col-25-left3">
				    <input id="dip1" type="file" name="pdf_diplome1_equivalent" >
				  </div> 
				</div>


				<div class="row">
					<p> <h5> <b>Autre diplôme :</b></h5> </p>
				  <div class="col-14-left">
				    <input type="radio" id="1_d_autre" name="type_diplome2" value="marocain" onclick="maroc_dip2()" ><b>Diplôme Marocain</b> <br>
				    <input type="radio" id="2_d_autre" name="type_diplome2" value="etranger" onclick="etrang_dip2()"><b>Diplôme Etranger</b>
				  </div>

				  <div class="col-9-left">
				    <label for="description_diplome2"> Description </label>
				  </div>

				  <div class="col-25-left">
				    <input type="text"  name="description_diplome2" placeholder=" Decrivez votre dîplome....">
				  </div>
				  
				  <div class="col-20-left">
				    <label for="pdf_diplome2">Télécharger (Diplôme):</label>
				  </div>

				  <div class="col-25-left">
				    <input type="file" name="pdf_diplome2">
				  </div>
				  <div class="col-20-left2">
				    <label id="tel22" for="pdf_diplome2_equivalent">Télécharger (Equivalent):</label>
				  </div>
				   <div class="col-25-left3">
				    <input id="dip2" type="file" name="pdf_diplome2_equivalent">
				  </div> 
				</div>


				<div class="row">
					<div class="col-35-left">
			      		<p > <h5><b> Jury de Thèse : </b></h5></p>
			    	</div>
			    </div>

			    	<!--#####################################################-->
			    <div class="row">
			    	<div class="col-35-left">
			      		<label for="president" > Président :<span class="req">*</span> </label> 
			    	</div>

			    	<div class="col-35-left">
			      		<input type="text" id="president" name="president" >
			    	</div>
			    </div>
			    	<!--#####################################################-->
			    <div class="row">

			    	<div class="col-35-left">
			      		<label for="jury1" > Jury1 :</label> 
			    	</div>

			    	<div class="col-35-left">
			      		<input type="text" id="jury1" name="jury1" >
			    	</div>
			    </div>

			    	<!--#####################################################-->
			    <div class="row">
			    	<div class="col-35-left">
			      		<label for="jury2" > Jury2 : </label> 
			    	</div>

			    	<div class="col-35-left">
			      		<input type="text" id="jury2" name="jury1" >
			    	</div>
			    </div>
			    	<!--#####################################################-->






 


				
			    

			    <input type="submit" value="Enregister">
			</form>


		</div>
		<!-- ############################### FIN Qualification########################################"-->



		<!-- ############################### Expérience########################################"-->
		<div class="form_zone" id="experience">  
			<form>
				<div class="row">
				  <div class="col-25-left">
				    <p> <b>Joignez votre CV ici<span class="req">*</span>  </b></p>
				  </div>
				   <div class="col-25-left">
				    <input type="file" name="cv">
				  </div> 
				</div>
				<br>

				<div class="row">
				 
				    <div class="col-25-left">
				    <p> <b>Nombre d'année d'experience<span class="req">*</span>:  </b></p>
				  </div>

				  <div class="col-5-left">
				    <input type="number"  name="nbr_annee_exper" min="0" value="0">
				  </div>
				  
				    <div class="col-9-left1">
				    <p> <b>Secteur:</b></p>
				  </div>
				  
				  <div class="col-9-left2">
				    <input type="radio" id="1_s" name="secteur" value="prive" onclick="sec_prive()"> <b>Privé </b><br>
				    <input type="radio" id="2_s" name="secteur" value="publique" onclick="sec_public()"><b>Publique</b>
				  </div>


				  
				  <div class="col-20-left">
				    <p> <b>Attestation de travail<span class="req">*</span></b></p>
				  </div>

				  <div class="col-25-left">
				    <input type="file" name="attestation_travail">
				  </div>
				  <div class="col-20-left4">
				    <p  id="allow_exam">  <b>Autorisation pour passer l'examen<span class="req">*</span> </b></p>
				  </div>
				   <div class="col-25-left4">
				    <input id="allow_file" type="file" name="autorisation">
				  </div> 
				</div>















			    <div class="row">
			    	<div class="col-35-left">
			      		<label for="decrir_experience" > Déscription de l'expérience <span class="req">*</span> </label>
			    	</div>

			    	<div class="col-55-left">
			    		<textarea name="decrir_experience" rows="10" cols="100" > Votre text ici....
						</textarea>
			    	</div>

			    </div>




			    <input type="submit" value="Enregister">

			</form>

		</div>
		<!-- ############################### FIN Expérience########################################"-->


		<div class="type_profil">
			<center><b> Profil Enseignant</b></center>
		</div>

		<!--################################Espace de modification#############################################-->
		



		<!--################################ FIN Espace de modification #############################################-->

	</div>





	<div class="menu_bar" id="menu_bar">
		<ul>
		  <li class="tab active" onclick="affi1(),sec_prive(),maroc_dip2(),maroc_dip()"><a href="#page_acceuil" ><span class="glyphicon glyphicon-home" style="font-size:30px;color:white;text-shadow:2px 2px 4px white;"></span>  <b> Page d'accueil</b></a></li>

		  <li class="tab" onclick="affi2(),sec_prive(),maroc_dip2(),maroc_dip()"><a href="#rens_person"><i style="font-size:30px;color:white;text-shadow:2px 2px 4px white;" class="fa">&#xf2bc;</i> <b>Renseignement personnel</b></a></li>

		  <li class="tab" onclick="affi3(),sec_prive(),maroc_dip2(),maroc_dip()"><a href="#detail_contact"><i style="font-size:30px;color:white;text-shadow:2px 2px 4px white;" class="fa">&#xf2ba;</i>   <b>Détails de contact</b></a></li>

		  <li class="tab" onclick="affi4(),sec_prive(),maroc_dip2(),maroc_dip()"><a href="#enseignement"><i style="font-size:30px;color:white;text-shadow:2px 2px 4px white;" class="fa">&#xf02d;</i>  <b> L'objet de candidature</b></a></li>

		  <li class="tab" onclick="affi5(),sec_prive()"><a href="#qualification"><i style="font-size:30px;color:white;text-shadow:2px 2px 4px white;" class="fa">&#xf19d;</i>  <b>Qualification académique</b></a></li>

		  <li class="tab" onclick="affi6(),maroc_dip2(),maroc_dip()"><a href="#experience"><i style="font-size:30px;color:white;text-shadow:2px 2px 4px white;" class='fas'>&#xf0b1;</i>  <b>Expérience professionnelle</b></a></li>
		</ul>

	</div >


<script src="formulaire1.js"></script>




</body>
</html>