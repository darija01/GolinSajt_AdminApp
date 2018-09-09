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
                            <a href="logout.php" ><i class="fa fa-fw fa-power-off"></i>Odjava</a>
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
                    <li class="active">
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
                        <h1 class="page-header">Sastanci</h1>
                        
                            <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>Ime i prezime</th>
              <th>Firma</th>
              <th>E-mail</th>
              <th>Telefon</th>
              <th>Datum</th>
              <th>Vrijeme</th>
              <th>Status</th>
              <th colspan="2"></th>
                </tr>
          </thead>   
    <tbody>
    <?php
    $konekcija=mysqli_connect('localhost', 'root', '','golin');
    $query = "SELECT * FROM sastanci";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $ime_i_prezime = $red['ime_i_prezime'];
        $firma = $red['firma'];
        $mail = $red['mail'];
        $telefon = $red['telefon'];
        $datum = $red['datum'];
        $vrijeme = $red['vrijeme'];
        $status = $red['status'];
        
        echo "<tr>";
        echo "<td>$ime_i_prezime</td>";
        echo "<td>$firma</td>";
        echo "<td>$mail</td>";
        echo "<td>$telefon</td>";
        echo "<td>$datum</td>";
        echo "<td>$vrijeme</td>";
        echo "<td>$status</td>";
        echo "<td><a href='sastanci.php?prihvati=$id'>Prihvati</a></td>";
        echo "<td><a href='sastanci.php?odbij=$id'>Odbij</a></td>";
        echo "</tr>";
  }
      
if(isset($_GET['prihvati'])){
        
    $id = $_GET['prihvati']; 
        
$query = "UPDATE  sastanci SET status = 'Sastanak prihvacen.' WHERE id = '{$id}' ";
$prihvaceno = mysqli_query($konekcija, $query);
        header("Location: sastanci.php");  
}
           
    if(isset($_GET['odbij'])){
    
    $id = $_GET['odbij']; 

$query = "UPDATE  sastanci SET status = 'Sastanak odbijen.'  WHERE id = '{$id}' ";
$odbijeno = mysqli_query($konekcija, $query);
        header("Location: sastanci.php");  
}
   ?>
 </tbody>
 </table> 
 
 <script type="text/javascript">
 function stampanje() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("stampanjeTabele").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>

        <h4>Pretraga sastanaka po datumu</h4>
     <form method="post">
        <input type="date" name="datum_od">
        <input type="date" name="datum_do">
        <button type="submit" name="pretraga" class="btn btn-default">Pretraga </button>
    </form><br>   
    
          
            
    <div>
      
      <div id="stampanjeTabele"> 
   <table class="table table-bordered table-hover">
       <thead>
         <tr>
             <th>Ime i prezime</th>
             <th>Firma</th>
             <th>E-mail</th>
             <th>Telefon</th>
             <th>Datum</th>
             <th>Vrijeme</th>
             <th>Status</th>
          </tr>
        </thead>   
    <tbody> 
    
<?php
 if(isset($_POST['pretraga'])){
    
    $datum_od = $_POST['datum_od'];
    $datum_do = $_POST['datum_do']; 

$query = "SELECT * from sastanci where datum between '{$datum_od}' and '{$datum_do}' order by datum";
$pretraga = mysqli_query($konekcija, $query);
     $brojac = mysqli_num_rows($pretraga);

     if($brojac==0){
        echo "<h2>Nema sastanaka u izabranom periodu</h2>";
     }else{
        while($red = mysqli_fetch_assoc($pretraga)){
        $id = $red['id'];
        $ime_i_prezime = $red['ime_i_prezime'];
        $firma = $red['firma'];
        $mail = $red['mail'];
        $telefon = $red['telefon'];
        $datum = $red['datum'];
        $vrijeme = $red['vrijeme'];
        $status = $red['status'];
        
        echo "<tr>";
        echo "<td>$ime_i_prezime</td>";
        echo "<td>$firma</td>";
        echo "<td>$mail</td>";
        echo "<td>$telefon</td>";
        echo "<td>$datum</td>";
        echo "<td>$vrijeme</td>";
        echo "<td>$status</td>";
        echo "</tr>";  
     }  
 }  
 }              
    ?>           
          
    </tbody>
       </table>  
      </div>
    <button onclick="stampanje();" class="btn btn-default">Štampanje</button>   
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank" ></iframe>
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
