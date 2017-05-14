
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GEST-UNIV</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/stylesheets/bootstrap.min.css">
     <link rel="stylesheet" href="css/stylesheets/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
     <!-- jvectormap -->
    <link rel="stylesheet" href="css/stylesheets/jquery-jvectormap-1.2.2.css">
    <link href="css/stylesheets/select2.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/stylesheets/AdminLTE.min.css">

    <link rel="stylesheet" href="css/stylesheets/main.css">
    <link rel="stylesheet" href="css/stylesheets/skins/skin-blue.min.css">
        <link rel="stylesheet" href="css/stylesheets/jquery-ui.css">

    <link rel="stylesheet" href="css/stylesheets/jquery-ui.css">

  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <?php
 
    if(!isset($_COOKIE['nom']) ){    
      echo '<script>window.location.href="./";</script>'; 
    }
   
  
    ?>
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GEST -</b> UNIV</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Gest -</b> Univ</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
               

             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs" >
                    <?php
                    
                      echo'<p>'.$_COOKIE['prenom'].' '.$_COOKIE['nom'].' </p>';
                    ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    
                <?php
                 echo'<p>'.$_COOKIE['email'].'</p>';
                ?>
                  </li>
                  
                  <li class="user-footer">

                  <form method="post" action="traitement.php">
                    <div class="pull-right">
                      <input type="submit" class="btn btn-default btn-flat" value="Deconnexion" name="deco"/>
                
                    </div>
                    </form>
                    
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
    
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            
            <li id="acc"><a   ><i class="fa fa-home"></i> <span> Bienvenue</span></a></li>
            <li class="treeview" id="question">
              <a href="#"><i class="fa fa-university"></i> <span>Gestion de l'université</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">               
                <li><a href="?s2=enseignantList" id="enseignant" >Enseignants</a></li>
                <li><a href="?s2=filiereList"    id="filiere">Filières</a></li>
                <!--li><a href="?s2=urfList"        id="urf">URF</a></li-->
              
              </ul>
            </li>
            <li class="treeview" id="param">
              <a href="#"><i class="fa fa-gear"></i> <span>Paramètres</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?s2=compteList" id="compteListe">Compte utilisateur</a></li>          
               
               </ul>
            </li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    
        <!-- Main content -->
        <section class="content">
        
         <?php
            // which page should be shown now
            $page = (isset($_GET['s2']) && $_GET['s2'] != '') ? $_GET['s2'] : 'compteList';
            // seul les pages listées ici pouront etre accessible
            // toute autre page sera le resultat d'une erreur
            $allowedPages = array(
                    'enseignantList',
                    'enseignantAdd',
                    'filiereList',
                    'urfList',
                    'compteList',                                                      
                    'compteAdd',                                                      
                    'compteView',                                                      
                    'enseignantAff',                                                      
                );
            $page=preg_replace("/[^a-z0-9_ ]/i", "", $page);
               if(!@require("html/".$page.".php"))die("Cette page n'existe pas sur le serveur, merci d'informer le webmaster du site si ce problème venait à se reproduire.");              
        ?>
        
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
     AMON SERGE/ LOUKOU JANVION / YMELE FABRICE
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 </strong> Tous droits reservés.
      </footer>

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
      <!-- REQUIRED JS SCRIPTS -->
    <script src="js/javascripts/jquery-1.9.1.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/javascripts/bootstrap.min.js"></script>

    <script src="js/javascripts/jquery-ui.js"></script> 
    <script src="js/javascripts/app.min.js"></script>

  </body>
</html>