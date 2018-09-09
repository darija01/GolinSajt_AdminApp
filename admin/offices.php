<?php session_start();?>
<?php ob_start();?>
<?php
$konekcija=mysqli_connect('localhost', 'root', '','golin');
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
                    <li>
                        <a href="blok2.php"><i class="fa fa-fw fa-dashboard"></i>Blok2</a>
                    </li>
                    <li>
                        <a href="clients.php"><i class="fa fa-fw fa-dashboard"></i>Clients</a>
                    </li>
                    <li>
                        <a href="goallin.php"><i class="fa fa-fw fa-dashboard"></i>Go all in</a>
                    </li>
                    <li class="active">
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
                           Offices
                        </h1>
                        
                  <form action="" method="post">
              <div class="form-group">
              
    <?php
                  
    if(isset($_GET['izmijeni'])){
    $id = $_GET['izmijeni']; 
$query = "SELECT * from offices WHERE id = '{$id}'";
$tabela2 = mysqli_query($konekcija, $query);
            
     while($red = mysqli_fetch_assoc($tabela2)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $opcije = $red['opcije'];
        $slika = $red['slika'];
        $naziv_slika = $red['naziv_slika'];
            ?>   
            <p>Naslov</p>
       <input value="<?php if(isset($id)){ echo $naslov; }?>" type="text" class="form-control" name="naslov"><br>
       <p>Tekst</p>
        <input value="<?php if(isset($id)){ echo $opcije; }?>" type="text" class="form-control" name="opcije"><br>
        <p>Slika</p>
         <input value="<?php if(isset($id)){ echo $slika; }?>" type="text" class="form-control" name="slika"><br>
         <p>Naziv slika</p>
          <input value="<?php if(isset($id)){ echo $naziv_slika; }?>" type="text" class="form-control" name="naziv_slika"><br>
        <input class="btn btn-primary" type="submit" name="btn_izmjena" value="Izmijeni" >
        <input class="btn btn-primary" type="submit" name="odustani" value ="Odustani" class="btn btn-default">
    
<?php }} ?>

<?php                  
if(isset($_POST['btn_izmjena'])){
    $naslov = $_POST['naslov']; 
    $opcije = $_POST['opcije']; 
    $slika = $_POST['slika']; 
    $naziv_slika = $_POST['naziv_slika']; 
    
    $query = "UPDATE offices SET naslov = '{$naslov}', opcije = '{$opcije}', slika = '{$slika}', naziv_slika = '{$naziv_slika}' WHERE id = '{$id}' ";
    $izmjena = mysqli_query($konekcija, $query);
        header("Location: offices.php");  
    if($izmjena){
        die("Greška" . mysqli_error($konekcija));
      }    
}  
   if(isset($_POST['odustani'])){
   header ("Location: offices.php"); 
}
                  
?>
<?php
                  
          if(isset($_GET['dodaj'])){
    $id = $_GET['dodaj']; 
$query = "SELECT * from offices WHERE id = '{$id}'";
$tabela2 = mysqli_query($konekcija, $query);
            
     while($red = mysqli_fetch_assoc($tabela2)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $opcije = $red['opcije'];
        $slika = $red['slika'];
        $naziv_slika = $red['naziv_slika'];
?>   
            
        <p>Naslov</p>
        <input value="" type="text" class="form-control" name="naslov"><br>
        <p>Opcije</p>
        <input value="" class="form-control" name="opcije"><br>
        <p>Slika</p>
        <input value="" type="text" class="form-control" name="slika"><br>
        <p>Naziv slika</p>
        <input value="" class="form-control" name="naziv_slika"><br>
        <input class="btn btn-primary" type="submit" name="btn_dodaj" value="Dodaj" >
        <input class="btn btn-primary" type="submit" name="odustani" value ="Odustani" class="btn btn-default">
    
<?php }} ?>        
                  
<?php              
                  
    if(isset($_POST['btn_dodaj'])){

    $naslov = $_POST['naslov']; 
    $opcije = $_POST['opcije']; 
    $slika = $_POST['slika']; 
    $naziv_slika = $_POST['naziv_slika']; 
        
        $naslov = mysqli_real_escape_string($konekcija, $naslov);
        $opcije = mysqli_real_escape_string($konekcija, $opcije);
        $slika = mysqli_real_escape_string($konekcija, $slika);
        $naziv_slika = mysqli_real_escape_string($konekcija, $naziv_slika);
    
    if($naslov == "" || empty($naslov)){
        echo "Nijeste popunili polje naslov.";
    }else if($opcije == "" || empty($opcije)){
         echo "Nijeste popunili polje opcije.";
    }else if($slika == "" || empty($slika)){
         echo "Nijeste popunili polje slika.";
    }else if($naziv_slika == "" || empty($naziv_slika)){
         echo "Nijeste popunili polje box naziv slika.";
    }else{
        $query="Insert into offices (naslov, opcije, slika, naziv_slika) value ('{$naslov}', '{$opcije}', '{$slika}', '{$naziv_slika}')";
        $rezultat = mysqli_query($konekcija, $query);
        header("Location: offices.php");
        if(!$rezultat){
            die('Greška'.mysqli_error($konekcija));
        }
 }
         }
?>
          
               </div>
                </form> 


            <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>ID</th>
              <th>Naslov</th>
              <th>Opcije</th>
              <th>Slika</th>
              <th>Naziv slike</th>
              <th colspan="3"></th>
                </tr>
          </thead>   
    <tbody>
    <?php
    $query = "SELECT * FROM offices";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $opcije = $red['opcije'];
        $slika = $red['slika'];
        $naziv_slika = $red['naziv_slika'];
        
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$naslov</td>";
        echo "<td>$opcije</td>";
        echo "<td><img width='150' class='img-responsive' src='images/Fotke offices/crno-bijelo/$slika'></td>";
        echo "<td>$naziv_slika</td>";
        echo "<td><a href='offices.php?obrisi=$id'>Obriši</a></td>";
        echo "<td><a href='offices.php?izmijeni=$id'>Izmijeni</a></td>";
        echo "<td><a href='offices.php?dodaj=$id'>Dodaj</a></td>";
        echo "</tr>";
  }    
    if(isset($_GET['obrisi'])){
    
    $id = $_GET['obrisi']; 

$query = "DELETE from offices WHERE id = '{$id}' ";
$brisanje = mysqli_query($konekcija, $query);
        header("Location: offices.php");  
}
?>
 </tbody>
 </table>       
                   
 

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
