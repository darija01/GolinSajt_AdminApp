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
                <a class="navbar-brand" href="index.phpl">Admin aplikacija</a>
            </div>
            <!-- Top Menu Items -->
<!--
            <ul class="nav navbar-right top-nav">
                <!-- Poruke  -->
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

            <!-- Obavjestenja  -->
               
<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                
                    </ul>
                </li>
-->
<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php //echo $_SESSION['username']?> <b class="caret"></b></a>
                    
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
-->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i>Log In</a>
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
                     <h1 class="page-header">Log In</h1>
    <div >                    
    <form action="" method="post">
        <div>
            <input type="text" name="username" placeholder="Entern username">
        </div><br>
        <div>
            <input type="password" name="password" placeholder="Entern password">
        </div><br>
        <div>
            <button type="submit" name = "loginn" class="btn btn-primary">Prijava</button>  

<?php
$konekcija=mysqli_connect('localhost', 'root', '','golin');

if($konekcija){

if(isset($_POST['loginn'])){

$username = $_POST['username'];
$password = $_POST['password'];
    
$username = mysqli_real_escape_string($konekcija, $username);
$password = mysqli_real_escape_string($konekcija, $password);
    
    $hashformat="$2y$10$";
    $salt="pasvord123123123123123";
    $enkripcija=crypt($password,$salt);
    echo $enkripcija;
    
$query="select * from admin_korisnici where username = '{$username}'";
$select_user_query = mysqli_query($konekcija, $query);

    if(!$select_user_query){
    die("Query failed".mysqli_error($konekcija)); 
    }   
    
    while($red = mysqli_fetch_assoc($select_user_query)){
        $baza_id = $red['id'];
        $baza_username = $red['username'];
        $baza_password = $red['password'];
        $baza_ime = $red['ime'];
        $baza_prezime = $red['prezime'];
  }
  
    
if($username === $baza_username && $password === $baza_password){
        $_SESSION['username'] = $baza_username; 
        $_SESSION['ime'] = $baza_ime;
        $_SESSION['prezime'] = $baza_prezime;  
        
        header ("Location: index.php"); 
    }else{
       header("Location: LogIn.php");
    }    
}
}

   ?>  
    
        </div>
    </form>
             </div>
                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>





