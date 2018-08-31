<?php session_start();?>
<?php
$konekcija=mysqli_connect('localhost', 'root', '','golin');


if($konekcija){

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];
    
$username = mysqli_real_escape_string($konekcija, $username);
$password = mysqli_real_escape_string($konekcija, $password);
    
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
       header("Location: LogIn.html");
    } 
    
}
 

}
   ?>
   
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
                <a class="navbar-brand" href="index.html">Admin aplikacija</a>
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
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-file"></i>Početna</a>
                    </li>
                    <li>
                        <a href="sastanci.php"><i class="fa fa-fw fa-dashboard"></i>Sastanci</a>
                    </li>
                    <li>
                        <a href="blok2.php"><i class="fa fa-fw fa-dashboard"></i>Blok2</a>
                    </li>
                    <li>
                        <a href="clients.php"><i class="fa fa-fw fa-dashboard"></i>Clients</a>
                    </li>
                    <li>
                        <a href="goallin.php"><i class="fa fa-fw fa-dashboard"></i>Go all in</a>
                    </li>
                    <li>
                        <a href="offices.php"><i class="fa fa-fw fa-dashboard"></i>Offices</a>
                    </li>
                    <li>
                        <a href="contact.php"><i class="fa fa-fw fa-dashboard"></i>Contact</a>
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
                        <h1 class="page-header">
                            Dobrodošli na admin sajt,
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>

            <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>Tekst</th>
              <th>Slika</th>
               <th></th>
               <th></th>
                </tr>
          </thead>   
    <tbody>
    <?php
    $query = "SELECT * FROM pocetna";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $tekst = $red['tekst'];
        $slika = $red['slika'];
        
        echo "<tr>";
        echo "<td>$tekst</td>";
        echo "<td>$slika</td>";
        echo "<td><a href='index.php?obrisi=$tekst'>Obriši</a></td>";
         echo "<td><a href='index.php?izmijeni=$tekst'>Izmijeni</a></td>";
        echo "</tr>";
  }
        
    
    if(isset($_GET['obrisi'])){
    
    $id = $_GET['obrisi']; 

$query = "DELETE from pocetna  WHERE tekst = '{$tekst}' ";
$odbijeno = mysqli_query($konekcija, $query);
        header("Location: index.php");  
}
    if(isset($_GET['izmijeni'])){
    
    $tekst = $_GET['tekst']; 
    $slika = $_GET['slika']; 
    

$query = "UPDATE pocetna SET tekst = '{$tekst}', slika = '{$slika}' WHERE tekst = '{$tekst}' ";
$odbijeno = mysqli_query($konekcija, $query);
        header("Location: index.php");  
}


   ?>
 </tbody>
 </table> 
                <form action="" method="post">
              <div>  
              <p>Tekst</p>  
               <input type="text" value = "<?php echo $tekst; ?>" name="tekst"></div>
               <br>
              <div>
               <p>Slika</p> 
                <input type="text" name="slika" value="<?php echo $slika; ?>" ></div>
              <br>
                        </form>
                
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
