<script src="js/javascripts/jquery-1.9.1.js"></script>
<script type="text/javascript">
var tableToExcel = (function() {
 var uri = 'data:application/vnd.ms-excel;base64,'
   , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
   , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
   , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
 return function(table, name) {
   if (!table.nodeType) table = document.getElementById(table)
   var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
   window.location.href = uri + base64(format(template, ctx))
 }
})()
</script>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste  des Comptes</h3>&nbsp;&nbsp;&nbsp;
                -&nbsp;&nbsp;&nbsp;
                <a href="backend.php?s2=compteAdd&opt=0">Nouveau Compte</a>
                &nbsp;&nbsp;&nbsp; -&nbsp;&nbsp;&nbsp;
                <a href="backend.php?s2=compteList"><i class="fa fa-refresh "></i></a>
                &nbsp;&nbsp;&nbsp;
                <button   onclick="tableToExcel('exe1', 'Liste des comptes')" class="btn btn-box-tool" title="Exporter en excel"><i class="fa fa-print"></i></button>

            </div><!-- /.box-header -->
            <div class="row">
              <form method="post" action="traitement.php">
                 <div class="col-md-6"></div>   
                 <div class="col-md-4">
                 <input type="text" class="form-control" name="searchnames" placeholder="Saisir une recherche"></div>
                 <div class="col-md-2">
                 <button class="btn bt-box-tool" name="searchBtns">      
                  <i class="fa fa-search "></i>
                 </button>
                 </div>
              </form>
             </div>
            <div class="box-body">
                  
                <table id="exe1" class="table table-bordered table-striped">
                    <thead>
                    <tr>                     
                        <th>Nom</th>
                        <th>Prenom(s)</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        
                    </tr>
                    </thead>
                    <tbody >
                      <?php
                       require_once 'webApi.php';
                       $messagesParPage=7;
                       $nbrequery ="SELECT COUNT(*) AS total FROM user where status = 1 ";
                       $retour_total=mysql_query($nbrequery) or die ('erreur sql '.$nbrequery.'</br>'.mysql_error());
                       $donnees_total = mysql_fetch_array($retour_total);
                       $total = $donnees_total['total'];
                       $nombreDePages=ceil($total/$messagesParPage);

                       if(isset($_GET['page'])) {
                               $pageActuelle=intval($_GET['page']);
                           
                               if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                               {
                                    $pageActuelle=$nombreDePages;
                               }
                          }
                          else // Sinon
                          {
                               $pageActuelle=1; // La page actuelle est la n°1    
                          }

                        $premiereEntree=($pageActuelle-1)*$messagesParPage;

                         if(isset($_GET['search'])) {         
                          $search = $_GET['search'];
                          }else{
                          $search ="";  
                          }
                          //echo '<script>alert('.$search.')</script>';

                        $query = "SELECT u.* FROM user u where status = 1 and (u.nom like '%".$search."%' or u.prenom like '%".$search."%') ORDER BY u.nom ASC LIMIT ".$premiereEntree.",".$messagesParPage;  
                        $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
                         while($row  = mysql_fetch_array($d)){
                            if($row[0]){
                              echo'<form  method="GET" action="traitement.php">';
                              echo'<tr>';
                              echo'<tr>';
                              echo'<input type="hidden" value="'.$row[0].'" name="idUser"></inpuut>';
                              echo'<td><input type="hidden" value="'.$row[1].'" name="namUser"></inpuut>',$row[1],'</td>';
                              echo'<td><input type="hidden" value="'.$row[2].'" name="lastNameUser"></inpuut>',$row[2],'</td>';
                              echo'<td><input type="hidden" value="'.$row[3].'" name="numUser"></inpuut>',$row[3],'</td>';
                              echo'<td><input type="hidden" value="'.$row[4].'" name="emailUser"></inpuut>',$row[4],'</td>';
                              echo'<td><button name="viewuser" class="btn btn-box-tool" title="Détail" ><i class="fa fa-folder-o "></button></td>';
                              echo'<td><button name="updateuser" class="btn btn-box-tool" title="Modifier" ><i class="fa fa-pencil "></button></td>';
                             // echo'<td><a class ="button" href="backend.php?s2=compteList&id='.$row[0].'""><i class="fa fa-times"></a></td>';
                          
                              echo'</form>';
                              echo'</tr>';
                               
                            }
                          }
             
                  echo'</tbody>';
                  echo'</table>';

                echo '<p align="center">Page : '; 

                  for($i=1; $i<=$nombreDePages; $i++) {
                    echo $i;
                       //On va faire notre condition
                       if($i==$pageActuelle) {
                           echo ' [ '.$i.' ] '; 
                       }  
                       else //Sinon...
                       {
                            echo '<a href="backend.php?s2=compteList&page='.$i.'">'.$i.'</a>';
                       }
                  }
                  echo '</p>';
                      ?>
                
            </div><!-- /.box-body -->
        </div>


<script src="js/javascripts/jquery-1.9.1.js"></script>