<?php session_start();?>
<?php ob_start();?>   
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin aplikacija</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="Golin.php">Golin</a>
                <a class="navbar-brand" href="index.php">Admin aplikacija</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <!--    Poruke   -->
<!--
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>   
                       <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">   
                        </li>

                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>

                    </ul>
                </li>
-->
            <!--     Obavjestenja        -->
<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                
                    </ul>
                </li>
-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profil.php"><i class="fa fa-fw fa-user"></i> Profil</a>
                        </li>
                        
<!--
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
-->
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Odjava</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="header.php"><i class="fa fa-fw fa-file"></i>Header</a>
                    </li>
                    <li >
                        <a href="meni.php"><i class="fa fa-fw fa-file"></i>Meni</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-file"></i>Početna</a>
                    </li>
                    <li>
                        <a href="sastanci.php"><i class="fa fa-fw fa-dashboard"></i>Sastanci</a>
                    </li>
                    <li >
                        <a href="blok2.php"><i class="fa fa-fw fa-dashboard"></i>Blok2</a>
                    </li>
                    <li >
                        <a href="clients.php"><i class="fa fa-fw fa-dashboard"></i>Clients</a>
                    </li>
                    <li >
                        <a href="goallin.php"><i class="fa fa-fw fa-dashboard"></i>Go all in</a>
                    </li>
                    <li>
                        <a href="offices.php"><i class="fa fa-fw fa-dashboard"></i>Offices</a>
                    </li>
                    <li>
                        <a href="contact.php"><i class="fa fa-fw fa-dashboard"></i>Contact</a>
                    </li>
                    <li>
                        <a href="footer1.php"><i class="fa fa-fw fa-dashboard"></i>Footer 1</a>
                    </li>
                     <li>
                        <a href="footer2.php"><i class="fa fa-fw fa-dashboard"></i>Footer 2</a>
                    </li>
                    <li class="active">
                        <a href="profil.php"><i class="fa fa-fw fa-dashboard"></i>Profil</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">Profil administratora, 
                    <small><?php echo $_SESSION['username']?></small></h1>
                                            
<?php 
$konekcija=mysqli_connect('localhost', 'root', '','golin');

if(isset($_SESSION['username'])){
      
    $username = $_SESSION['username'];

$query="SELECT * FROM admin_korisnici WHERE username = '{$username}' ";
$rezultat = mysqli_query($konekcija, $query);

    while($red = mysqli_fetch_array($rezultat)){
        $username = $red['username'];
        $user_password = $red['password'];
        $user_ime = $red['ime'];
        $user_prezime = $red['prezime'];    
    }
}


if(isset($_POST['izmjena_profila'])){
    
    $username = $_POST['username']; 
    $user_password = $_POST['user_password']; 
    $user_ime = $_POST['user_ime'];
    $user_prezime = $_POST['user_prezime']; 

$query1 = "UPDATE admin_korisnici SET password = '{$user_password}', ime = '{$user_ime}', prezime = '{$user_prezime}' WHERE username = '{$username}' ";
  
$rezultat1 = mysqli_query($konekcija, $query1);
}
    if(isset($_POST['odustani'])){
   header ("Location: index.php"); 
}
?>
<div> 
           <form action="" method="post">
              <div>  
              <p>Username</p>  
               <input type="text" value = "<?php echo $username; ?>" name="username"></div>
               <br>
              <div>
               <p>Password</p> 
                <input type="password" name="user_password" value="<?php echo $user_password; ?>" ></div>
              <br>
              <div>
               <p>Ime</p> 
                <input type="text" name="user_ime"  value = "<?php echo $user_ime; ?>"></div>
              <br>
              <div>
              <p>Prezime</p> 
               <input type="text" name="user_prezime"  value = "<?php echo $user_prezime; ?>"></div>
               <br>
               <div>
               <input type="submit" name="izmjena_profila" value ="Izmijeni" class="btn btn-primary">
               
               <input type="submit" name="odustani" value ="Odustani" class="btn btn-primary"></div>
        </form>
</div>
 
                        
                        
                    </div>
                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
