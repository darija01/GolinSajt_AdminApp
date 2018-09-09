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
                    <li class="active">
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
                           Go All In
                        </h1>
                
<form action="" method="post">
              <div class="form-group">
              
    <?php
                  
    if(isset($_GET['izmijeni'])){
    $id = $_GET['izmijeni']; 
$query = "SELECT * from goallin WHERE id = '{$id}'";
$tabela2 = mysqli_query($konekcija, $query);
            
     while($red = mysqli_fetch_assoc($tabela2)){
        $id = $red['id'];
        $naslov1 = $red['naslov1'];
        $naslov2 = $red['naslov2'];
        $tekst = $red['tekst'];
        $box_naslov = $red['box_naslov'];
        $box_slika = $red['box_slika'];
        $box_tekst = $red['box_tekst'];
            ?>   
       <p>Naslov 1</p>
       <input value="<?php if(isset($id)){ echo $naslov1; }?>" type="text" class="form-control" name="naslov1"><br>
       <p>Naslov 2</p>
        <input value="<?php if(isset($id)){ echo $naslov2; }?>" type="text" class="form-control" name="naslov2"><br>
        <p>Tekst</p>
        <input value="<?php if(isset($id)){ echo $tekst; }?>" type="text" class="form-control" name="tekst"><br>
        <p>Box naslov</p>
        <input value="<?php if(isset($id)){ echo $box_naslov; }?>" type="text" class="form-control" name="box_naslov"><br>
        <p>Box slika</p>
         <input value="<?php if(isset($id)){ echo $box_slika; }?>" type="text" class="form-control" name="box_slika"><br>
         <p>Box tekst</p>
          <input value="<?php if(isset($id)){ echo $box_tekst; }?>" type="text" class="form-control" name="box_tekst"><br>
        <input class="btn btn-primary" type="submit" name="btn_izmjenaa" value="Izmijeni">
        <input class="btn btn-primary" type="submit" name="odustani" value ="Odustani" class="btn btn-default">
<?php }} ?>
<?php                  
if(isset($_POST['btn_izmjenaa'])){
    
        $naslov1 = $_POST['naslov1'];
        $naslov2 = $_POST['naslov2'];
        $tekst = $_POST['tekst'];
        $box_naslov = $_POST['box_naslov'];
        $box_slika = $_POST['box_slika'];
        $box_tekst = $_POST['box_tekst'];
  
    
    $query = "UPDATE goallin SET naslov1 = '{$naslov1}', naslov2 = '{$naslov2}', tekst = '{$tekst}', box_naslov = '{$box_naslov}', box_slika = '{$box_slika}', box_tekst = '{$box_tekst}' WHERE id = '{$id}' ";
    $tabela2 = mysqli_query($konekcija, $query);
        header("Location: goallin.php");  
    if($tabela2){
        die("Greška" . mysqli_error($konekcija));
      }   }    
  
   if(isset($_POST['odustani'])){
   header ("Location: goallin.php"); 
}                 
?>
<?php       
        if(isset($_GET['dodaj'])){
    $id = $_GET['dodaj']; 
$query = "SELECT * from goallin WHERE id = '{$id}'";
$tabela2 = mysqli_query($konekcija, $query);
            
     while($red = mysqli_fetch_assoc($tabela2)){
        $id = $red['id'];
        $naslov1 = $red['naslov1'];
        $naslov2 = $red['naslov2'];
        $tekst = $red['tekst'];
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
?>   
       <p>Naslov 1</p>      
        <input  type="text" class="form-control" name="naslov1"><br>
       <p>Naslov 2</p>
       <input type="text" class="form-control" name="naslov2"><br>
       <p>Tekst</p>
        <input  type="text" class="form-control" name="tekst"><br>
        <p>Box slika</p>
         <input  type="text" class="form-control" name="box_slika"><br>
          <p>Box naslov</p>
         <input  type="text" class="form-control" name="box_naslov"><br>
         <p>Box tekst</p>
          <input type="text" class="form-control" name="box_tekst"><br>
        <input class="btn btn-primary" type="submit" name="btndodaj" value="Dodaj" >
        <input class="btn btn-primary" type="submit" name="odustani" value ="Odustani" class="btn btn-default">
<?php }} ?>        
                  
<?php              
                  
    if(isset($_POST['btndodaj'])){

   $naslov1 = $_POST['naslov1']; 
    $naslov2 = $_POST['naslov2']; 
    $tekst = $_POST['tekst']; 
    $box_slika = $_POST['box_slika']; 
    $box_naslov = $_POST['box_naslov']; 
    $box_tekst = $_POST['box_tekst']; 
        
        $naslov1 = mysqli_real_escape_string($konekcija, $naslov1);
        $naslov2 = mysqli_real_escape_string($konekcija, $naslov2);
        $tekst = mysqli_real_escape_string($konekcija, $tekst);
        $box_slika = mysqli_real_escape_string($konekcija, $box_slika);
        $box_naslov = mysqli_real_escape_string($konekcija, $box_naslov);
        $box_tekst = mysqli_real_escape_string($konekcija, $box_tekst);
        
    if($naslov1 == "" || empty($naslov1)){
        echo "Nijeste popunili polje naslov 1.";
    }else if($naslov2 == "" || empty($naslov2)){
         echo "Nijeste popunili polje naslov 2.";
    }else if($tekst == "" || empty($tekst)){
         echo "Nijeste popunili polje tekst.";
    }else if($box_slika == "" || empty($box_slika)){
         echo "Nijeste popunili polje box slika.";
    }else if($box_naslov == "" || empty($box_naslov)){
         echo "Nijeste popunili polje box naslov.";
    }else if($box_tekst == "" || empty($box_tekst)){
         echo "Nijeste popunili polje box tekst.";
     }else{ 
        $query="Insert into goallin (naslov1, naslov2, tekst, box_naslov, box_slika, box_tekst) value ('{$naslov1}', '{$naslov2}', '{$tekst}', '{$box_naslov}',  '{$box_slika}', '{$box_tekst}')";
        $rezultat = mysqli_query($konekcija, $query);
        header("Location: goallin.php");
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
              <th>Id</th>
              <th>Naslov 1</th>
              <th>Naslov 2</th>
              <th>Tekst</th>
              <th>Box slika</th>
              <th>Box naslov</th>
              <th>Box tekst</th>
              <th colspan="3"> </th>
               
                </tr>
          </thead>   
    <tbody>
    <?php
    $query = "SELECT * FROM goallin";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov1 = $red['naslov1'];
        $naslov2 = $red['naslov2'];
        $tekst = $red['tekst'];
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
        
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td><img class='img-responsive' src='images/$naslov1'></td>";
         echo "<td>$naslov2</td>";
         echo "<td>$tekst</td>";
         echo "<td><img class='img-responsive' src='images/Ikonice krugovi/$box_slika'></td>";
         echo "<td>$box_naslov</td>";
         echo "<td>$box_tekst</td>";
   
        echo "<td><a href='goallin.php?obrisi=$id'>Obriši</a></td>";
        echo "<td><a href='goallin.php?izmijeni=$id'>Izmijeni</a></td>";
         echo "<td><a href='goallin.php?dodaj=$id'>Dodaj</a></td>";
        echo "</tr>";
  }
    if(isset($_GET['obrisi'])){
    
    $id = $_GET['obrisi']; 

$query = "DELETE from goallin  WHERE id = '{$id}' ";
$odbijeno = mysqli_query($konekcija, $query);
        header("Location: goallin.php");  
       
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
