<?php

session_start();
$hostname="localhost";
$username="admin_db_candidature";
$password="q3h8RhPO2Rh3ur9y";
$conn=mysqli_connect($hostname,$username,$password,"candidat");

if(!$conn){
	die("connexion failed:".mysqli_connect_error());
}

if (isset($_POST["register_btn"])) {
	
	$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
	$family_name=mysqli_real_escape_string($conn,$_POST['family_name']);
	$email=mysqli_real_escape_string($conn,$_POST['email_add']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password2=mysqli_real_escape_string($conn,$_POST['password2']);
	$profil=$_POST['profil'];
	
	if (empty($first_name)|| empty($family_name)|| empty($email)|| empty($password)|| empty($password2))
				{ 
				header("location: register.php");
				
				}
	
	else {
		$_SESSION["msg"]="";
					if ($password==$password2){
						$password=sha1($password);
						
						
						if ($profil=="administratif")
							{	
								
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
								
								$sql="SELECT * FROM users_administratif WHERE email_addr='$email'";
								$result=mysqli_query($conn,$sql);
								
								if(mysqli_num_rows($result)==0){
									$sql="INSERT INTO users_administratif (firstname_fr,lastname_fr,email_addr,mot_de_passe) VALUES('$first_name','$family_name','$email','$password')";
									mysqli_query($conn,$sql);
									
									$sqlnum="SELECT * FROM users_administratif WHERE email_addr='$email' AND mot_de_passe='$password'";
									$resultnum=mysqli_query($conn,$sqlnum);
									$rownum = mysqli_fetch_array($resultnum);
									$id_num=$rownum['id'];
									
									$num_candidat="00".$id_num."/ad/".date('Y');
									$sql_misajour="UPDATE users_administratif SET numero_candidature='$num_candidat' WHERE id='$id_num'";
									mysqli_query($conn,$sql_misajour);
									
									
									$sql2="SELECT * FROM users_administratif WHERE email_addr='$email' AND mot_de_passe='$password'";
									$results=mysqli_query($conn,$sql2);
									$row = mysqli_fetch_array($results);
									$result1=$row['firstname_fr'];
									$_SESSION["nom"]=$result1;
									$result2=$row['lastname_fr'];
									$_SESSION["prenom"]=$result2;
									$result3=$row['id'];
									$_SESSION["id"]=$result3;
									$_SESSION["division"]="affi1()";
									$result4=$row['numero_candidature'];
									$_SESSION["num_candidature"]=$result4;
									
									
									$sql3="SELECT * FROM poste_administratif";
									$results=mysqli_query($conn,$sql3);
									$poste_finale=array();
									while ($row = mysqli_fetch_array($results)) {	
										$result1=$row['poste_administratif'];
										$poste_finale[]=$result1;}
									$_SESSION["array_poste"]=$poste_finale;
									
									
									
									header("location: administratif.php");
									
									
									
								}
								
								elseif(mysqli_num_rows($result)==1){
									echo "Vous êtes déjà inscris dans la plateforme <br> Veuillez vous connecter";}
								}
								
								else echo ("<h5> Date d'inscription expirée</h5>");
							}
							
							
							
							
							elseif ($profil=="enseignant")
							{
								
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
								
								$sql="SELECT * FROM users_enseignant WHERE email_addr='$email'";
								$result=mysqli_query($conn,$sql);
								
								if(mysqli_num_rows($result)==0){
									
									$sql="INSERT INTO users_enseignant (firstname_fr,lastname_fr,email_addr,mot_de_passe) VALUES('$first_name','$family_name','$email','$password')";
									mysqli_query($conn,$sql);
									
									
									
									$sqlnum="SELECT * FROM users_enseignant WHERE email_addr='$email' AND mot_de_passe='$password'";
									$resultnum=mysqli_query($conn,$sqlnum);
									$rownum = mysqli_fetch_array($resultnum);
									$id_num=$rownum['id'];
									
									$num_candidat="00".$id_num."/en/".date('Y');
									$sql_misajour="UPDATE users_enseignant SET numero_candidature='$num_candidat' WHERE id='$id_num'";
									mysqli_query($conn,$sql_misajour);
									
									
									
									
									
									
									$sql2="SELECT * FROM users_enseignant WHERE email_addr='$email' AND mot_de_passe='$password'";
									$results=mysqli_query($conn,$sql2);
									$row = mysqli_fetch_array($results);
									$result1=$row['firstname_fr'];
									$_SESSION["nom"]=$result1;
									$result2=$row['lastname_fr'];
									$_SESSION["prenom"]=$result2;
									$result3=$row['id'];
									$_SESSION["id"]=$result3;
									$_SESSION["division"]="affi1()";
									$result4=$row['numero_candidature'];
									$_SESSION["num_candidature1"]=$result4;
									
									$sql3="SELECT * FROM poste_enseignant";
									$results6=mysqli_query($conn,$sql3);	
									$poste_finale1=array();
									while ($row = mysqli_fetch_array($results6)) {
										$result2=$row['poste_enseignant'];
										$poste_finale1[]=$result2;}
									$_SESSION["array_poste1"]=$poste_finale1;
									
									
									header("location: enseignant.php");
									
				
									
				
									
									
									
									
									
									
									
									
									
								}
								
								elseif(mysqli_num_rows($result)==1){
									echo "Vous êtes déjà inscris dans la plateforme <br> Veuillez vous connecter";}
								}
								
						else echo ("<h5> Date d'inscription expirée</h5>");
							}
						
					}	
					else{
				
						echo "Les deux mots de passe ne sont pas identiques";
					}		
					}
}
?>