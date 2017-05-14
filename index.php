<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GEST-UNIV</title>
    <link rel="shortcut icon" type="image/png" href="cssimages/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/stylesheets/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/stylesheets/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="css/stylesheets/blue.css">
    <script src="js/jquery-1.9.1.js"></script>

  </head>
  <body class="hold-transition login-page">
   
    <form method="post" action="traitement.php">
      <div class="login-box">
        <div class="login-logo">
          <b>GEST-UNIV </b><a> Authentification</a>
        </div>
        <div class="login-box-body">
          <p class="login-box-msg"> Entrez vos paramètres de connexion</p>  
          <div class="alert alert-danger" role="alert" id="err-mg" style="display :none"></div> 
         
            <div class="form-group ">
              <input type="text" class="form-control" placeholder="Email" name="username" required>

            </div>
            <div class="form-group ">
              <input type="password" class="form-control" placeholder="Password" required name="motPasse">

            </div>
            <div class="row">
                         
              <div class="pull-center">
              <input class="btn btn-success btn-block btn-signin" type="submit" name="auth" value ="Se Connecter"/>
              
            </div>
            </div>
          
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->
    </form>

    <!-- jQuery 2.1.4 -->
    <script src="js/javascripts/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/javascripts/bootstrap.min.js"></script>

  </body>
</html>