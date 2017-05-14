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
                <h3 class="box-title">Liste  des Filières</h3>&nbsp;&nbsp;&nbsp;
                -&nbsp;&nbsp;&nbsp;
                <a href="backend.php?s2=filiereAdd&opt=0">Nouvelle Filière</a>
               &nbsp;&nbsp;&nbsp;   -&nbsp;&nbsp;&nbsp;
                <a href="backend.php?s2=filiereList"><i class="fa fa-refresh "></i></a>
                &nbsp;&nbsp;&nbsp;
                <button   onclick="tableToExcel('exe1', 'Liste des filières')" class="btn btn-box-tool" title="Exporter en excel"><i class="fa fa-print"></i></button>

            </div><!-- /.box-header -->
             <div class="row">
              <form method="post" action="traitement.php">
                 <div class="col-md-6"></div>   
                 <div class="col-md-4">
                 <input type="text" class="form-control" name="searchname" placeholder="Saisir une recherche"></div>
                 <div class="col-md-2">
                 <button class="btn bt-box-tool" name="searchBtnFil">      
                  <i class="fa fa-search "></i>
                 </button>
                 </div>
              </form>
             </div>
            <div class="box-body">
                  
                <table id="exe1" class="table table-bordered table-striped">
                    <thead>
                    <tr>                     
                        <th>Filière</th>
                        <th>Description(s)</th>
                        <th></th>
                        <th></th>                        
                    </tr>
                    </thead>
                    <tbody >
                      <?php
                       require_once 'webApi.php';
                       $messagesParPage=7;
                       $nbrequery ="SELECT COUNT(*) AS total FROM filiere where status = 1 ";
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

                        $query = "SELECT f.* FROM filiere f where status = 1 and  (f.libelle like '%".$search."%' )  ORDER BY f.libelle ASC LIMIT ".$premiereEntree.",".$messagesParPage;  
                        $d=mysql_query($query) or die ('erreur sql '.$query.'</br>'.mysql_error());
                         while($row  = mysql_fetch_array($d)){
                            if($row[0]){
                              echo'<form  method="GET" action="traitement.php">';
                              echo'<tr>';
                              echo'<tr>';
                              echo'<input type="hidden" value="'.$row[0].'" name="idFilr"></inpuut>';
                              echo'<td><input type="hidden" value="'.$row[1].'" name="nameFil"></inpuut>',$row[1],'</td>';
                              echo'<td><input type="hidden" value="'.$row[2].'" name="desc"></inpuut>',$row[2],'</td>';
                              echo'<td><button name="viewFil" class="btn btn-box-tool" title="Détail" ><i class="fa fa-folder-o "></button></td>';
                              echo'<td><button name="updateFil" class="btn btn-box-tool" title="Modifier" ><i class="fa fa-pencil "></button></td>';
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