<?php
session_start();
$hostname="localhost";
$username="admin_db_candidature";
$password="q3h8RhPO2Rh3ur9y";
$conn=mysqli_connect($hostname,$username,$password,"candidat");

if(!$conn){
	die("connexion failed:".mysqli_connect_error());
}

if (isset($_POST["database_en"])){
	
			$sql2="SELECT * FROM users_enseignant ";
			$results=mysqli_query($conn,$sql2);
	
			
			$excel = "";
			$excel .=  "Id\tNom\tPrénom\n";
			
			foreach($results as $row) {
				$excel .= "$row['id']\t$row['firstname_fr']\t$row['lastname_fr']\n";
			}
			
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: attachment; filename=liste-clients.xls");
			
			print $excel;
			exit;

}

if (isset($_POST["appliquer"])){
	
	$date_debut=$_POST['date_debut'];
	$date_fin=$_POST['date_fin'];
	$id=1;
	
	$sql="UPDATE duree_candidature SET date_debut='$date_debut', date_fin='$date_fin' WHERE id='$id'";
	mysqli_query($conn,$sql);
	
	
	$delee="SELECT * FROM duree_candidature WHERE id='$id'";
	$delee_var=mysqli_query($conn,$delee);
	$row_date = mysqli_fetch_array($delee_var);
	$result_date1=$row_date['date_debut'];
	$_SESSION["date1"]=$result_date1;
	$result_date2=$row_date['date_fin'];
	$_SESSION["date2"]=$result_date2;
	
	header("location: admin_enseignant.php");
	$_SESSION["division"]="affi1()";
	
}


if (isset($_POST["enregistrer1"])) {
	
	$firstname_fr=$_POST['firstname_fr'];
	$firstname_ar=$_POST['firstname_ar'];
	$lastname_fr=$_POST['lastname_fr'];
	$lastname_ar=$_POST['lastname_ar'];
	$birth_day=$_POST['birth_day'];
	$genre=$_POST['genre'];
	$cin=$_POST['cin'];
	$id=$_SESSION["id"];
	
	//#####upload file CIN############################################################
	
	$file =$_FILES["cin_pdf"];
	
	$fileName=$_FILES['cin_pdf']['name'];
	
	$fileTmpName=$_FILES['cin_pdf']['tmp_name'];
	
	$fileError=$_FILES['cin_pdf']['error'];
	
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	
	$allowed = "pdf";
	
	if($fileActualExt==$allowed) {
		
		
		if($fileError=== 0){
			
			$fileNameNew = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_CIN.pdf";
			
			$fileDestination = 'fichiers_pdf/enseignant/CIN/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			
		}		
		else "There was an error";	
	}
	else{	
		echo "you can't upload  this type of file";	
	}
	
	
	
	
	//##### FIN upload file CIN############################################################
	
	$cin_pdf=$fileDestination;
	
	$sql="UPDATE users_enseignant SET firstname_fr='$firstname_fr',firstname_ar='$firstname_ar',lastname_fr='$lastname_fr',lastname_ar='$lastname_ar',birth_day='$birth_day',genre='$genre',cin='$cin',	cin_pdf='$cin_pdf' WHERE id='$id'";
	mysqli_query($conn,$sql);
	header("location: enseignant.php");
	$_SESSION["division"]="affi3()";
	$_SESSION["nom"]=$lastname_fr;
	$_SESSION["prenom"]=$firstname_fr;
	
	
}


if (isset($_POST["enregistrer2"])) {
	
	$pays=$_POST['pays'];
	$ville=$_POST['ville'];
	$code_postal=$_POST['code_postal'];
	$telephone1=$_POST['telephone1'];
	$telephone2=$_POST['telephone2'];
	$email_addr=$_POST['email_addr'];
	$id=$_SESSION["id"];
	
	$sql="UPDATE users_enseignant SET pays='$pays',ville='$ville',code_postal='$code_postal',telephone1='$telephone1',telephone2='$telephone2',email_addr='$email_addr' WHERE id='$id' ";
	
	mysqli_query($conn,$sql);
	header("location: enseignant.php");
	$_SESSION["division"]="affi4()";
	
	
}
if (isset($_POST["enregistrer3"])) {
	
	$case_a_cocher=$_POST['poste_rechercher'];
	$poste='';
	
	foreach($case_a_cocher as $valeur)
	{
		$poste=$poste."[".$valeur."] ;";
	}
	
	$id=$_SESSION["id"];
	
	$sql="UPDATE enseignant SET poste1='$poste' WHERE id='$id'";
	mysqli_query($conn,$sql);
	
	header("location: enseignant.php");
	$_SESSION["division"]="affi5()";
	
}


if (isset($_POST["enregistrer4"])) {
	
	$type_dip1=$_POST['type_diplome1'];
	$description_dip1=$_POST['description_diplome1'];
	//$file1=$_POST['pdf_diplome1'];
	//$file_eq1=$_POST['pdf_diplome1_equivalent'];
	$type_dip2=$_POST['type_diplome2'];
	$description_dip2=$_POST['description_diplome2'];
	//$file2=$_POST['pdf_diplome2'];
	//$file_eq2=$_POST['pdf_diplome2_equivalent'];
	$president=$_POST['president'];
	$jury1=$_POST['jury1'];
	$jury2=$_POST['jury2'];
	
	$id=$_SESSION["id"];
	
	
	//##### upload file  Diplome ############################################################
	$file1 =$_FILES["pdf_diplome1"];
	$file1_eq =$_FILES["pdf_diplome1_equivalent"];
	$file2 =$_FILES["pdf_diplome2"];
	$file2_eq =$_FILES["pdf_diplome2_equivalent"];
	
	
	$file1Name =$_FILES["pdf_diplome1"]['name'];
	$file1Name_eq=$_FILES["pdf_diplome1_equivalent"]['name'];
	$file2Name =$_FILES["pdf_diplome2"]['name'];
	$file2Name_eq=$_FILES["pdf_diplome2_equivalent"]['name'];
	
	
	$file1TmpName =$_FILES["pdf_diplome1"]['tmp_name'];
	$file1TmpName_eq=$_FILES["pdf_diplome1_equivalent"]['tmp_name'];
	$file2TmpName =$_FILES["pdf_diplome2"]['tmp_name'];
	$file2TmpName_eq=$_FILES["pdf_diplome2_equivalent"]['tmp_name'];
	
	
	
	$file1Error=$_FILES["pdf_diplome1"]['error'];
	$file1Error_eq=$_FILES["pdf_diplome1_equivalent"]['error'];
	$file2Error=$_FILES["pdf_diplome2"]['error'];
	$file2Error_eq=$_FILES["pdf_diplome2_equivalent"]['error'];
	
	
	$fileExt1= explode('.',$file1Name);
	$fileExt1_eq= explode('.',$file1Name_eq);
	$fileExt2= explode('.',$file2Name);
	$fileExt2_eq= explode('.',$file2Name_eq);
	
	
	
	
	$fileActualExt1 = strtolower(end($fileExt1));
	$fileActualExt1_eq = strtolower(end($fileExt1_eq));
	$fileActualExt2 = strtolower(end($fileExt2));
	$fileActualExt2_eq = strtolower(end($fileExt2_eq));
	
	
	$allowed = "pdf";
	
	
	
	////////////////diplome1/////////////////////////
	if($fileActualExt1==$allowed) {
		
		if($file1Error=== 0){
			
			$file1NameNew = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_diplome1.pdf";
			
			$file1Destination = 'fichiers_pdf/enseignant/diplome1/'.$file1NameNew;
			move_uploaded_file($file1TmpName, $file1Destination);
		}
	}
	////////////////Fin diplome1/////////////////////////
	
	
	
	////////////////diplome1_eq/////////////////////////
	if($fileActualExt1_eq ==$allowed) {
		
		if($file1Error_eq=== 0){
			
			$file1NameNew_eq = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_diplome1_eq.pdf";
			
			$file1Destination_eq = 'fichiers_pdf/enseignant/diplome1_equivalent/'.$file1NameNew_eq;
			move_uploaded_file($file1TmpName_eq, $file1Destination_eq);
		}
	}
	////////////////Fin diplome1_eq/////////////////////////
	
	
	////////////////diplome2/////////////////////////
	if($fileActualExt2==$allowed) {
		
		if($file2Error=== 0){
			
			$file2NameNew = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_diplome2.pdf";
			
			$file2Destination = 'fichiers_pdf/enseignant/diplome2/'.$file2NameNew;
			move_uploaded_file($file2TmpName, $file2Destination);
		}
		
	}
	////////////////Fin diplome2/////////////////////////
	
	
	////////////////diplome2_eq/////////////////////////
	if($fileActualExt2_eq==$allowed) {
		
		if($file2Error_eq=== 0){
			
			$file2NameNew_eq = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_diplome2_eq.pdf";
			
			$file2Destination_eq = 'fichiers_pdf/enseignant/diplome2_equivalent/'.$file2NameNew_eq;
			move_uploaded_file($file2TmpName_eq, $file2Destination_eq);
		}
	}
	////////////////Fin diplome2_eq/////////////////////////
	// FIN upload file Diplome #####################################################
	
	
	$file1=$file1Destination;
	$file_eq1=$file1Destination_eq;
	$file2=$file2Destination;
	$file_eq2=$file2Destination_eq;
	
	
	
	
	
	
	
	$sql="UPDATE users_enseignant SET type_diplome1='$type_dip1',description_diplome1='$description_dip1', pdf_diplome1='$file1',pdf_diplome1_equivalent='$file_eq1', type_diplome2='$type_dip2',description_diplome2='$description_dip2', pdf_diplome2='$file2',pdf_diplome2_equivalent='$file_eq2',jury_president='$president',jury1='$jury1',jury2='$jury2' WHERE id='$id'";
	
	mysqli_query($conn,$sql);
	header("location: enseignant.php");
	$_SESSION["division"]="affi6()";
}

if (isset($_POST["enregistrer5"])) {
	
	$nbr_annee_exper=$_POST['nbr_annee_exper'];
	$secteur=$_POST['secteur'];
	$decrir_experience=$_POST['decrir_experience'];
	$id=$_SESSION["id"];
	
	
	// upload file cv attest autauris #####################################################
	$file_cv =$_FILES["cv"];
	$fileName_cv=$_FILES['cv']['name'];
	$fileTmpName_cv=$_FILES['cv']['tmp_name'];
	$fileError_cv=$_FILES['cv']['error'];
	$fileExt_cv = explode('.', $fileName_cv);
	$fileActualExt_cv = strtolower(end($fileExt_cv));
	
	
	$file_at =$_FILES["attestation_travail"];
	$fileName_at=$_FILES['attestation_travail']['name'];
	$fileTmpName_at=$_FILES['attestation_travail']['tmp_name'];
	$fileError_at=$_FILES['attestation_travail']['error'];
	$fileExt_at = explode('.', $fileName_at);
	$fileActualExt_at = strtolower(end($fileExt_at));
	
	
	$file_au =$_FILES["autorisation"];
	$fileName_au=$_FILES['autorisation']['name'];
	$fileTmpName_au=$_FILES['autorisation']['tmp_name'];
	$fileError_au=$_FILES['autorisation']['error'];
	$fileExt_au = explode('.',$fileName_au);
	$fileActualExt_au = strtolower(end($fileExt_au));
	
	
	
	
	
	
	$allowed = "pdf";
	
	if($fileActualExt_cv==$allowed) {
		if($fileError_cv=== 0){
			
			$fileNameNew_cv = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_cv.pdf";
			
			$fileDestination_cv = 'fichiers_pdf/enseignant/cv/'.$fileNameNew_cv;
			move_uploaded_file($fileTmpName_cv, $fileDestination_cv);	}}
			
	if($fileActualExt_at==$allowed) {
			if($fileError_at=== 0){
					
					$fileNameNew_at = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_attestation_traval.pdf";
					
					$fileDestination_at = 'fichiers_pdf/enseignant/attestation_de_travail/'.$fileNameNew_at;
					move_uploaded_file($fileTmpName_at, $fileDestination_at);
					
				}}
				
	if($fileActualExt_au==$allowed) {
					
					
			if($fileError_au=== 0){
						
						$fileNameNew_au = $_SESSION["nom"]."_".$_SESSION["prenom"]."_en_autorisation_traval.pdf";
						
						$fileDestination_au = 'fichiers_pdf/enseignant/autorisation_examen/'.$fileNameNew_at;
						move_uploaded_file($fileTmpName_au, $fileDestination_au);
						
					}}

	// FIN upload file cv attest autauris#####################################################
					
					
	$cv=$fileDestination_cv;
	$attestation_travail=$fileDestination_at;
	$autorisation=$fileDestination_au;
	
	
	
	$sql="UPDATE users_enseignant SET cv='$cv', nbr_annee_exper='$nbr_annee_exper', secteur='$secteur', attestation_travail_pdf='$attestation_travail',autorisation_pdf='$autorisation',decrire_experience='$decrir_experience' WHERE id='$id'";
	mysqli_query($conn,$sql);
	header("location: enseignant.php");
	$_SESSION["division"]="affi6()";
	
	
	/*if (!mysqli_query($conn,$sql))
	 {
	 echo "l'erreur est :".mysqli_error($conn);
	 }*/
	
}



if (isset($_POST["ajouter"])) {
	
	$poste_name=$_POST['poste_name'];
	$sql5="INSERT INTO poste_enseignant (poste_enseignant) VALUES('$poste_name')";
	mysqli_query($conn,$sql5);
	
	$sql3="SELECT * FROM poste_enseignant";
	$results6=mysqli_query($conn,$sql3);
	
	$poste_finale1=array();
	while ($row = mysqli_fetch_array($results6)) {
		
		$result2=$row['poste_enseignant'];
		$poste_finale1[]=$result2;
	}
	

	header("location: admin_enseignant.php");
	$_SESSION["division"]="affi4()";
	$_SESSION["array_poste1"]=$poste_finale1;
	
	
	
	
	
}

if (isset($_POST["supprimer"])) {
	
	$poste_name=$_POST['poste_name'];
	$sql5="DELETE FROM poste_enseignant WHERE poste_enseignant='$poste_name'";
	mysqli_query($conn,$sql5);
	
	$sql3="SELECT * FROM poste_enseignant";
	$results6=mysqli_query($conn,$sql3);
	
	$poste_finale1=array();
	while ($row = mysqli_fetch_array($results6)) {
		
		$result2=$row['poste_enseignant'];
		$poste_finale1[]=$result2;
	}
	
	
	header("location: admin_enseignant.php");
	$_SESSION["division"]="affi4()";
	$_SESSION["array_poste1"]=$poste_finale1;

}





?>