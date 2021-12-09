<?php
session_start();
$hostname="localhost";
$username="admin_db_candidature";
$password="q3h8RhPO2Rh3ur9y";
$conn=mysqli_connect($hostname,$username,$password,"candidat");

if(!$conn){
	die("connexion failed:".mysqli_connect_error());
}

if (isset($_POST["login_btn"])) {
	$email=mysqli_real_escape_string($conn,$_POST['adr_mail']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$profil=$_POST['profil'];
		
	if ($email=="admin"&$password=="admin"){
		if ($profil=="administratif"){
			
			//récupérer date debut et fin
			$id=2;
			$delee="SELECT * FROM duree_candidature WHERE id='$id'";
			$delee_var=mysqli_query($conn,$delee);
			$row_date = mysqli_fetch_array($delee_var);
			$result_date1=$row_date['date_debut'];
			$_SESSION["date1"]=$result_date1;
			$result_date2=$row_date['date_fin'];
			$_SESSION["date2"]=$result_date2;
			// fin récupérer date debut et fin
			
			
			//récuperer les postes administratifs
			$sql2="SELECT * FROM poste_administratif";
			$results=mysqli_query($conn,$sql2);
			
			$poste_finale=array();
			while ($row = mysqli_fetch_array($results)) {
				
				$result1=$row['poste_administratif'];
				$poste_finale[]=$result1;
			}
			
			//fin poste administratif
			header("location: admin_administratif.php");
			$_SESSION["array_poste"]=$poste_finale;
			
	
		}
		elseif($profil=="enseignant"){
			
			//récupérer date debut et fin
			$id=1;
			$delee="SELECT * FROM duree_candidature WHERE id='$id'";
			$delee_var=mysqli_query($conn,$delee);
			$row_date = mysqli_fetch_array($delee_var);
			$result_date1=$row_date['date_debut'];
			$_SESSION["date1"]=$result_date1;
			$result_date2=$row_date['date_fin'];
			$_SESSION["date2"]=$result_date2;
			// fin récupérer date debut et fin
			
			
			$sql3="SELECT * FROM poste_enseignant";
			$results6=mysqli_query($conn,$sql3);
			
			$poste_finale1=array();
			while ($row = mysqli_fetch_array($results6)) {
				
				$result2=$row['poste_enseignant'];
				$poste_finale1[]=$result2;
			}
			

			header("location: admin_enseignant.php");
			$_SESSION["array_poste1"]=$poste_finale1;
		}
	}
	else{

				$password=sha1($password);
		if ($profil=="administratif"){
					
					//récupérer date debut et fin
					$id=2;
					$delee="SELECT * FROM duree_candidature WHERE id='$id'";
					$delee_var=mysqli_query($conn,$delee);
					$row_date = mysqli_fetch_array($delee_var);
					$result_date1=$row_date['date_debut'];
					$_SESSION["date1"]=$result_date1;
					$result_date2=$row_date['date_fin'];
					$_SESSION["date2"]=$result_date2;
					// fin récupérer date debut et fin
					
					
					
					//inscription autorisée dans l'intervalle spécifié
						$y=date("Y-m-d");
			if (($result_date1 < $y) && ($y < $result_date2)){
					
						$sql="SELECT * FROM users_administratif WHERE email_addr='$email' AND mot_de_passe='$password'";
						$result=mysqli_query($conn,$sql);
						
						if(mysqli_num_rows($result)==1){

						header("location: administratif.php");
						
						$row = mysqli_fetch_array($result);
						$result1=$row['firstname_fr'];
						$_SESSION["nom"]=$result1;
	
						$result2=$row['lastname_fr'];
						$_SESSION["prenom"]=$result2;
						
						$result3=$row['id'];
						$_SESSION["id"]=$result3;
						$_SESSION["division"]="affi1()";
						$result4=$row['numero_candidature'];
						$_SESSION["num_candidature"]=$result4;
						
						$sql2="SELECT * FROM poste_administratif";
						$results=mysqli_query($conn,$sql2);
						
						$poste_finale=array();
						while ($row = mysqli_fetch_array($results)) {
							$result1=$row['poste_administratif'];
							$poste_finale[]=$result1;}
						$_SESSION["array_poste"]=$poste_finale;
						}
					
						elseif(mysqli_num_rows($result)==0){
						echo "Vous n'êtes pas inscris dans la plateforme";}
				}
				
				else echo ("<h5> Date d'inscription expirée</h5>");
				
				
		}
				
				
				elseif($profil=="enseignant"){
					
					//récupérer date debut et fin
					$id=1;
					$delee="SELECT * FROM duree_candidature WHERE id='$id'";
					$delee_var=mysqli_query($conn,$delee);
					$row_date = mysqli_fetch_array($delee_var);
					$result_date1=$row_date['date_debut'];
					$_SESSION["date1"]=$result_date1;
					$result_date2=$row_date['date_fin'];
					$_SESSION["date2"]=$result_date2;
					// fin récupérer date debut et fin
					
					//inscription autorisée dans l'intervalle spécifié
					$y=date("Y-m-d");
					if (($result_date1 < $y) && ($y < $result_date2)){
					
					
					$sql="SELECT * FROM users_enseignant WHERE email_addr='$email' AND mot_de_passe='$password'";
					$result=mysqli_query($conn,$sql);
					
					if(mysqli_num_rows($result)==1){
					
					$sql3="SELECT * FROM poste_enseignant";
					$results6=mysqli_query($conn,$sql3);
					
					$poste_finale1=array();
					while ($row = mysqli_fetch_array($results6)) {
						
						$result2=$row['poste_enseignant'];
						$poste_finale1[]=$result2;
					}
					
					header("location: enseignant.php");
					
					$_SESSION["array_poste1"]=$poste_finale1;
					$row = mysqli_fetch_array($result);
					$result1=$row['firstname_fr'];
					$_SESSION["nom"]=$result1;
					
					$result2=$row['lastname_fr'];
					$_SESSION["prenom"]=$result2;
					
					$result3=$row['id'];
					$_SESSION["id"]=$result3;	
					$_SESSION["division"]="affi1()";
					$result4=$row['numero_candidature'];
					$_SESSION["num_candidature1"]=$result4;
		
					}
				
					elseif(mysqli_num_rows($result)==0){
						echo "Vous n'êtes pas inscris dans la plateforme";}
			
					}
					else echo ("<h5> Date d'inscription expirée</h5>");
				}
		

	}}
	?>