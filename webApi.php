<?php
    require_once '_connexion.php';
    require_once 'PassHash.php';
    header ('Content-type:text/html; charset=utf-8');

    function createUser($nom,$prenom,$contact,$email,$password,$opt,$id){

    	 if (!isUserExists($email)) {
            // Generating password hash
            $password_hash = PassHash::hash($password);

            // insert query         

            $query = "INSERT INTO `user` (`nom`, `prenom`, `contact`, `email`,`motPasse`)  VALUES ('".$nom."', '".$prenom."', '".$contact."', '".$email."', '".$password_hash."')";
            $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
            // Check for successful insertion
            if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }
        } else {
            // User with same email already existed in the db
             echo "<script>alert(Rien)</script>";
            return 2;
        }

    }
    function updateUser($nom,$prenom,$contact,$email,$password,$id){
        $password_hash = PassHash::hash($password);
         
         $query ="UPDATE `user` SET `nom`='".$nom."', `prenom`='".$prenom."', `contact`='".$contact."', `email`='".$email."', `motPasse`='".$password_hash."' WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
         if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }

    }
    function deleteUser($id){     
         
         $query ="UPDATE `user` SET `status`=0 WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());

         if ($d) {                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }

    }

    function login($email,$pswd){
    	$query = "SELECT motPasse FROM USER WHERE status = 1 and  email ='".$email."'";  
        $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
        $num_rows = mysql_num_rows($d);
        if ($num_rows > 0) {
            $row = mysql_fetch_array($d);
            $password =  $row['motPasse'];
       
            if (PassHash::check_password($password, $pswd)) {
                $query = "SELECT u.* FROM user u where email ='".$email."'";  
                $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
                 while($row  = mysql_fetch_array($d)){
                            if($row[0]){
                             setcookie("id", $row[0]);
                             setcookie("nom",$row[1]);
                             setcookie("prenom",$row[2]);
                             setcookie("email",$row[4]);
                             setcookie("deco", 0);
                               
                               
                            }
                        }
              echo '<script>window.location.href="backend.php?s2=compteList";</script>';
                      
                // User password is correct
                return 0;
            } else {
                // user password is incorrect
                return 1;
            }
        }
        else{

        return 2;

        }

    }

  function isUserExists($email) {

    $query = "SELECT id FROM user WHERE status = 1 and email ='".$email."'";  
    $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
    $num_rows = mysql_num_rows($d);
	  return $num_rows > 0;
        
    }
       function logout(){
        setcookie("deco", 1);
        echo '<script>window.location.href="./";</script>';

    }
    
 
     function createEns($nom,$prenom,$contact,$email,$opt,$id){

       
            // Generating password hash
          

            // insert query         

            $query = "INSERT INTO `enseignant` (nom, prenom, contact, email)  VALUES ('".$nom."', '".$prenom."', '".$contact."', '".$email."')";
            $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
            // Check for successful insertion
            if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }
        } 

        function updateEns($nom,$prenom,$contact,$email,$id){
               
         $query ="UPDATE `enseignant` SET `nom`='".$nom."', `prenom`='".$prenom."', `contact`='".$contact."', `email`='".$email."' WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
         if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
        }

    }

      function affectEns($idEn,$idFil){

           // insert query   
        $queryV = "SELECT id FROM affectation WHERE status = 1 and idEns='".$idEn."' and idEns ='".$idFil."'";  
        $d=mysql_query($queryV) or die ('erreur sql '.$query.'</br>'.mysql_error());
        $num_rows = mysql_num_rows($d);   

        if($num_rows<=0)  {

            $query = "INSERT INTO `affectation` (`idEns`,`idFil`)  VALUES ('".$idEn."', '".$idFil."')";
            $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
            // Check for successful insertion
            if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }
        } 
        

    }

     
     function deleteEns($id){     
         
         $query ="UPDATE `enseignant` SET `status`=0 WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());

         if ($d) {                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }

    }


        function createFil($libelle,$description,$opt,$id){

           // insert query         

            $query = "INSERT INTO `filiere` (`libelle`,`desc`)  VALUES ('".$libelle."', '".$description."')";
            $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
            // Check for successful insertion
            if ($d) {
                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }
        

    }

     function updateFil($libelle,$desc,$id){     
         
         $query ="UPDATE `filiere`  SET `libelle`='".$libelle."', `desc`='".$desc."' WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());

         if ($d) {                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }

    }

   function deletFil($id){     
         
         $query ="UPDATE `filiere` SET `status`=0 WHERE `id`=".$id;
         $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());

         if ($d) {                 
                return 0;
            } else {
                // Failed to create user
                return 1;
            }

    }
?>