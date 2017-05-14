 <script src="js/javascripts/jQuery-2.1.4.min.js"></script>
<?php
include('webApi.php');
 header ('Content-type:text/html; charset=utf-8');

if(isset($_POST["auth"])){
     $username = $_POST["username"];
     $motPasse = $_POST["motPasse"];
	 $val = login($username,$motPasse);
	 switch ($val) {
	 	case 0:	 
	   
	 	    echo'<script>alert("Bienvenue !!!");</script>';
	 		break; 	
	 	case 1:
	 	    echo'<script>alert("Mot de passe incorrect");</script>';
	 		logout();	 		
	 	 		//echo'<div class="alert alert-danger" role="alert" id="err-mg" style="display :block">Mot de passe incorrect</div>';
	 		break; 
	 	case 2:
	 	     echo'<script>alert("L\'email inexistant !!!");</script>';
	 		logout();

	 		break;
	 	
	 	default:
	 		logout();
	 		break;
	 }

   }
	if(isset($_POST["deco"])){
	 		logout();

	}
	
	if(isset($_POST["userSave"])){

		  $nom      = $_POST["name"];
		  $prenom   = $_POST["lastname"];
		  $contact  = $_POST["number"];
		  $email    = $_POST["email"];
		  $password = $_POST["password"];
		  $id       = $_POST["idUpate"];
		  $opt      = $_POST["option"];


		  switch ($opt) {

		  	case 0:
	 	  		$result = createUser($nom,$prenom,$contact,$email,$password,$opt,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Création avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=compteList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Le mail existe dèjà");</script>';
	 	  		}else if($result == 2){				
	 	  		     echo'<script>alert("Erreur lors de la création");</script>';
	 	  		}

		  		break;

		  	case 1:
		      	$result = updateUser($nom,$prenom,$contact,$email,$password,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Modification avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=compteList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Echec de la modification");</script>';
	 	  		}

		  		break;
		  	
		  	default:
		  		break;
		  }  		


	}

	if(isset($_GET["updateuser"])){
		$idUser = $_GET["idUser"];
		$namUser = $_GET["namUser"];
		$lastNameUser = $_GET["lastNameUser"];
		$numUser = $_GET["numUser"];
		$emailUser = $_GET["emailUser"];
		echo '<script>window.location.href="backend.php?s2=compteAdd&opt=1&id='.$idUser.'&n='.$namUser.'&p='.$lastNameUser.'&c='.$numUser.'&e='.$emailUser.'";</script>';
	}
	if(isset($_GET["viewuser"])){
		$idUser = $_GET["idUser"];
		$namUser = $_GET["namUser"];
		$lastNameUser = $_GET["lastNameUser"];
		$numUser = $_GET["numUser"];
		$emailUser = $_GET["emailUser"];
		echo '<script>window.location.href="backend.php?s2=compteView&&id='.$idUser.'&n='.$namUser.'&p='.$lastNameUser.'&c='.$numUser.'&e='.$emailUser.'";</script>';
	}
	if(isset($_POST["delect"])){
		$idUser = $_POST["idDelect"];
		
		$result = deleteUser($idUser);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Suppression avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=compteList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Echec de la suppression");</script>';
	 	  		}

	}

	//Api Enseignant

		if(isset($_POST["enseSave"])){

		  $nom      = $_POST["name"];
		  $prenom   = $_POST["lastname"];
		  $contact  = $_POST["number"];
		  $email    = $_POST["email"];
		  $id       = $_POST["idUpate"];
		  $opt      = $_POST["option"];


		  switch ($opt) {

		  	case 0:
	 	  		$result = createEns($nom,$prenom,$contact,$email,$opt,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Création avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=enseignantList";</script>';
	 	  			}
	 	  		else if($result == 1){				
	 	  		     echo'<script>alert("Erreur lors de la création");</script>';
	 	  		}

		  		break;

		  	case 1:
		      	$result = updateEns($nom,$prenom,$contact,$email,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Modification avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=enseignantList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Echec de la modification");</script>';
	 	  		}

		  		break;
		  	
		  	default:
		  		break;
		  }  		
	}

	if(isset($_GET["updateEns"])){
		$idUser = $_GET["idUser"];
		$namUser = $_GET["namUser"];
		$lastNameUser = $_GET["lastNameUser"];
		$numUser = $_GET["numUser"];
		$emailUser = $_GET["emailUser"];
		echo '<script>window.location.href="backend.php?s2=enseignantAdd&opt=1&id='.$idUser.'&n='.$namUser.'&p='.$lastNameUser.'&c='.$numUser.'&e='.$emailUser.'";</script>';
	}

		if(isset($_POST["affEns"])){
		$idEn   = $_POST["idEn"];
		$idFil  = $_POST["idFil"];
		$result = affectEns($idEn,$idFil);

	  		if ($result == 0){
	  		     //echo'<script>alert("Enregistrement avec succès");</script>';
	  			 echo '<script>window.location.href="backend.php?s2=enseignantList";</script>';
	  		}else if($result == 1){
	  			
	  		     echo'<script>alert("Echec de la modification");</script>';
	  		}

	}
		


	if(isset($_GET["viewEns"])){
		$idUser = $_GET["idUser"];
		$namUser = $_GET["namUser"];
		$lastNameUser = $_GET["lastNameUser"];
		$numUser = $_GET["numUser"];
		$emailUser = $_GET["emailUser"];
		echo '<script>window.location.href="backend.php?s2=enseignantView&&id='.$idUser.'&n='.$namUser.'&p='.$lastNameUser.'&c='.$numUser.'&e='.$emailUser.'";</script>';
	}
	if(isset($_POST["delectEns"])){
			$idUser = $_POST["idDelect"];
			
			$result = deleteEns($idUser);
		 	  		if ($result == 0){
		 	  		     echo'<script>alert("Suppression avec succès");</script>';
		 	  			 echo '<script>window.location.href="backend.php?s2=enseignantList";</script>';
		 	  		}else if($result == 1){
		 	  			
		 	  		     echo'<script>alert("Echec de la suppression");</script>';
		 	  		}

		}

	if(isset($_GET["affEns"])){
		$idUser = $_GET["idUser"];
		$namUser = $_GET["namUser"];
		$lastNameUser = $_GET["lastNameUser"];		
		echo '<script>window.location.href="backend.php?s2=enseignantAff&&id='.$idUser.'&n='.$namUser.'&p='.$lastNameUser.'";</script>';
	}

		 if(isset($_POST["searchBtn"])){
		  	$search = $_POST['searchname'];
		  	echo '<script>window.location.href="backend.php?s2=enseignantList&search='.$search.'"</script>';
		  }
		  if(isset($_POST["searchBtns"])){
		  	$search = $_POST['searchnames'];
		  	echo '<script>window.location.href="backend.php?s2=compteList&search='.$search.'"</script>';
		  }




if(isset($_POST["filiererSave"])){

		  $libelle  = $_POST["name"];
		  $description   = $_POST["description"];
		  $id       = $_POST["idUpate"];
		  $opt      = $_POST["option"];


		  switch ($opt) {

		  	case 0:
	 	  		$result = createFil($libelle,$description,$opt,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Création avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=filiereList";</script>';
	 	  			}
	 	  		else if($result == 1){				
	 	  		     echo'<script>alert("Erreur lors de la création");</script>';
	 	  		}

		  		break;

		  	case 1:
		      	$result = updateFil($libelle,$description,$id);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Modification avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=filiereList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Echec de la modification");</script>';
	 	  		}

		  		break;
		  	
		  	default:
		  		break;
		  }  		
	}

	if(isset($_GET["updateFil"])){
		  $libelle     = $_GET["nameFil"];
		  $description = $_GET["desc"];
		  $idFilr = $_GET["idFilr"];	
	
	    echo '<script>window.location.href="backend.php?s2=filiereAdd&opt=1&id='.$idFilr.'&n='.$libelle.'&p='.$description.'";</script>';
	}

	if(isset($_GET["viewFil"])){
		  $libelle     = $_GET["nameFil"];
		  $description = $_GET["desc"];
		  $idFilr = $_GET["idFilr"];
		  echo '<script>window.location.href="backend.php?s2=filiereView&opt=1&id='.$idFilr.'&n='.$libelle.'&p='.$description.'";</script>';
	}

	if(isset($_POST["delectFil"])){
		$idFil = $_POST["idDelect"];
		
		$result = deletFil($idFil);
	 	  		if ($result == 0){
	 	  		     echo'<script>alert("Suppression avec succès");</script>';
	 	  			 echo '<script>window.location.href="backend.php?s2=filiereList";</script>';
	 	  		}else if($result == 1){
	 	  			
	 	  		     echo'<script>alert("Echec de la suppression");</script>';
	 	  		}

	}

	 if(isset($_POST["searchBtnFil"])){
		  	$search = $_POST['searchname'];
		  	echo '<script>window.location.href="backend.php?s2=filiereList&search='.$search.'"</script>';
		  }
		  if(isset($_POST["searchBtns"])){
		  	$search = $_POST['searchnames'];
		  	echo '<script>window.location.href="backend.php?s2=filiereList&search='.$search.'"</script>';
		  }

?>