
 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <section class="content-header">
          <div class="modal-header text-center">
              
          <h1 class="modal-title">DETAIL UTILISATEUR </a></h1>
          <h4 class="modal-title" > <a href="backend.php?s2=compteList">Retour à la liste des Comptes</a> </h4>
                
        </div>
      </section>
      <form method="post" action="traitement.php">
      <div class="register-box-body">
         <input name="idDelect" type="hidden" value="<?php echo htmlspecialchars($_GET["id"]);?>"/> 
               <div class="form-group has-feedback">
            <label class="control-label">
              Nom <span class="symbol required" ></span>
          </label>
            <input type="text" class="form-control textBox" name="name" disabled  value="<?php echo htmlspecialchars($_GET["n"]);?>">
        </div>
         <div class="form-group has-feedback">
            <label class="control-label">
              Prénom (s) <span class="symbol required"></span>
          </label>
            <input type="text" disabled class="form-control textBox" name="lastname"  value="<?php echo htmlspecialchars($_GET["p"]);?>">
        </div>
        <div class="form-group has-feedback">
            <label class="control-label">
         Contact  <span class="symbol required"></span>
          </label>
            <input type="text" disabled class="form-control textBox" maxlength="10" name="number"  value="<?php echo htmlspecialchars($_GET["c"]);?>">
        </div>
      
        <div class="form-group has-feedback">
            <label class="control-label">
              Email <span class="symbol required" required="true"></span>
          </label>
            <input type="text"  disabled class="form-control textBox"  name="email" value="<?php echo htmlspecialchars($_GET["e"]);?>">
        </div>
       
        <div class="pull-right">
            <div class="btn-group">
           <div style="cursor:pointer" class="pull-right" >
            
            <input class="btn btn-danger btn-block btn-signin" type="submit" value="SUPPRIMER" name="delect"/>
          </div>
            </div>
        </div>
        <br/><br/>
     
    </div>
  </form>
      </div>
    </div>

  </div>
</div>
<script src="js/javascripts/jquery-1.9.1.js"></script>