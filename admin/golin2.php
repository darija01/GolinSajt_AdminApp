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
    <meta name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin aplikacija</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom Fonts -->
<!--    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    
    <link rel="stylesheet" href="Adizajn.css" name="viewport" content="width=device-width, initial-scale=1" />

<style>
.modal {
    display: none; 
    position: fixed; 
    z-index: 1;
    padding-top: 25px; 
    padding-left: 462px;
    padding-right: 462px;
    padding-bottom: 50px;
    left: 0;
    top: 0;
    width: auto; 
    height: auto; 
    overflow: auto; 
    background-color: white; 
    background-color: rgba(225,225,225,0.7);
    text-align: center;
}
.modal-sadrzaj {
    background-color: RGB(33,33,33);
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 10px !important;  
}
.modal-sadrzaj h3{
    color: white;
}
.btn{
    background-color: RGB(243,189,37);
    border-radius: 15px;
    width: 190px;
    height: 50px;    
    border: none;
    color: black;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
}   
.zatvaranje{
    background: url(x%20ikonica.svg);
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.zatvaranje:hover,
.zatvaranje:focus {
    color: RGB(243,189,37);
    text-decoration: none;
    cursor: pointer;
}   
.forma{
    padding: 20px;
    border-radius: 25px !important;
}    
.txt{
    text-align: center;
    border-radius: 8px !important;  
}
.kolona1{
    float: left;
	
}
.kolona2{
	float: right;

}
</style>
</head>
<body>
	<div class="pocetna">
		<br>
		<div class="zaglavlje">
		<?php
    $query = "SELECT * FROM header";
    $rezultat = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($rezultat)){
        $slika = $red['slika'];
        echo "<img style='height:10px;'src='images/$slika'>";
  }    
		?>
		</div>
		
	<div class="lijevo">

		<div class = "logo">
			<?php
            
    $query = "SELECT slika FROM meni where id = 1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $slika = $red['slika'];
         echo  "<img class='logo1' src='images/$slika'>"; 
  }    ?>		
		</div>
		</div>
		
	<div class="desno">
		<div>
		
		<?php
    $query = "SELECT * FROM meni";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $slika = $red['slika'];
        $kategorija = $red['kategorija'];
       
        echo "<a href=''>$kategorija</a>";
      
  }    ?>
		</div>
		</div>
		
	<div class="dio2">
		<img src="images/fotka1.png">
		<div class="tekst2">
		<?php
            $query = "SELECT * FROM pocetna";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $tekst = $red['tekst'];
        $slika = $red['slika'];
        
       
        echo "<h1>$naslov</h1>";
        echo "$tekst";
       
  }    
            ?>
		</div>
	<br><br><br><br></div>
	
		<input type="submit" class="sastanak" id = "sastanak" value="ZAKAŽI SASTANAK" onclick="zakazivanje()">
        <div id="Modal" class="modal">
          <div class="modal-sadrzaj" >     
       <span class="zatvaranje">&times;</span>
    <form  action="FormaGolin.php" method="post">
        <div class="forma">
          <img src="Logo_GolinPG.svg" width="200px;" class="slika" class='img-responsive'>	<br>
          <h3>Zakažite sastanak sa nekim od naših poslodavaca.</h3>
          <div><input class="txt" type="text" name="ime_i_prezime" id="ime_i_prezime" placeholder="Ime i prezime" style="width: 296px; height: 30px;"> </div>
          <div><br><input class="txt" type="text" name="firma" id="firma" placeholder="Firma" style="width: 296px; height: 30px;"> </div>
          <div><br><input class="txt" type="text" name="mail" id="mail" placeholder="e-Mail" style="width: 296px; height: 30px;"></div>
          <div><br><input class="txt" type="number" name="telefon" id="telefon" placeholder="Broj telefona" style="width: 296px; height: 30px;"></div>
          <div class="kolona1"><br>      
          <input class="txt" type="date" name="datum" id="datum" style="width: 140px; height: 30px;"> </div>
          <div class="txt" class="kolona2"><br>
          <input class="txt" type="time" name="vrijeme" id="vrijeme" value="10:00" style="width: 140px; height: 30px;"> </div>
           <br><br> 
            <div>
        <input  type="submit" name="zakazi" data-inline="true" class="btn" value="ZAKAŽI SASTANAK"> </div>
        </div>
      </form>
  </div>

</div>
	
	<script>
var modal = document.getElementById('Modal');
var btn = document.getElementById("sastanak");
var span = document.getElementsByClassName("zatvaranje")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
	
	
	<div class="dio3">
		<div class="tekst3">
		
		<?php
    $query = "SELECT * FROM blok2 where id=1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $tekst = $red['tekst'];
        $slika = $red['slika'];
        
        echo "<h1 style= 'width:300px'>$naslov</h1>";
        echo "$tekst";
        
  }    ?>

		</div>
		<div class="slika2">
		<?php  echo  "<img src='images/$slika'>";?>
		</div>
		
		<div class="tekst4">
			<?php
    $query = "SELECT * FROM blok2 where id=2";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $tekst = $red['tekst'];
        $slika = $red['slika'];
        
        
        echo "<h1>$naslov</h1>";
        echo "$tekst";
        
  }    ?>
		</div>
		<div class="slika3">
		<?php  echo  "<img class='img-responsive' src='images/$slika'>";?>
		</div>
        </div>
        
        
	<div class="clients">
			<h1>CLIENTS</h1>
		</div><br><br>
		
	<div class="slike">
	<img class="pozadina" src="images/fotka4.png" ></div>
		<div class="slike-clients">
		<div class="cs" style="width:80%; margin-left:10%;">
		 <?php
    $query = "SELECT * FROM clients";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $slike = $red['slike'];
        $pozadina = $red['pozadina'];
        
        echo "<img width='200'  src='images/Fotke clients/$slike'>";
        
  }    ?>
		</div>

	</div>	
        
		<div class="dio4"><br><br>
			<img src="images/go-all-in.gif">
		</div>
	
	
	<div class="box">
	<img src="images/fotka5.png">
		<div class="box2">
		<div class="tekst5">
		
		
		 <?php
    $query = "SELECT * FROM goallin where id=1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $naslov2 = $red['naslov2'];
        $tekst = $red['tekst'];
        
        echo "<h2>$naslov2</h2>";
        echo "$tekst";

  }
    ?>
		
		<div class="box3">
		<?php 
            $query = "SELECT box_slika, box_naslov, box_tekst FROM goallin where id=1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
        
         echo "<img src='images/Ikonice krugovi/$box_slika'><br><br><br>";
         echo "<h3>$box_naslov</h3>";
         echo "$box_tekst";     
  }
       ?>	
		
		<div class="box4">
				<?php 
            $query = "SELECT box_slika, box_naslov, box_tekst FROM goallin where id=2";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
        
         echo "<img src='images/Ikonice krugovi/$box_slika'><br><br><br>";
         echo "<h3>$box_naslov</h3>";
         echo "$box_tekst";     
  }
       ?>

		<div class="box5">
				<?php 
            $query = "SELECT box_slika, box_naslov, box_tekst FROM goallin where id=3";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
        
         echo "<img src='images/Ikonice krugovi/$box_slika'><br><br><br>";
         echo "<h3>$box_naslov</h3>";
         echo "$box_tekst";     
  }
       ?>
	
		<div class="box6">
				<?php 
    $query = "SELECT box_slika, box_naslov, box_tekst FROM goallin where id=4";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        
        $box_slika = $red['box_slika'];
        $box_naslov = $red['box_naslov'];
        $box_tekst = $red['box_tekst'];
        
         echo "<img src='images/Ikonice krugovi/$box_slika'><br><br><br>";
         echo "<h3>$box_naslov</h3>";
         echo "$box_tekst";     
  }
       ?>
		</div></div></div></div></div></div>
	</div>
	
	<div class="office">
	
	 <?php
    $query = "SELECT * FROM offices where id=1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $id = $red['id'];
        $naslov = $red['naslov'];
        $opcije = $red['opcije'];
        $slika = $red['slika'];
        $naziv_slika = $red['naziv_slika'];
        
        echo "<h1><a href=''>$naslov</a></h1>";
  }    
        ?>
	<div class="opcije">
	<h3><a href="">EMEA </a>
	<a href="">AMERICAS </a>
	<a href="">ASIA </a></h3>
	</div>
	<div class="slike2">
		<div class="cs" style="width:80%; margin-left:10%;">
	 <?php
    $query = "SELECT * FROM offices";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $slika = $red['slika'];
        $naziv_slika = $red['naziv_slika'];
        
       
        echo "<img src='images/Fotke offices/crno-bijelo/$slika'>";
        
        
  }    ?>
<!--
		<img src="Fotke offices\crno-bijelo\podgorica.png">
		<div class="txt-gradovi1"><p>PODGORICA</p></div>
		<img src="Fotke offices\crno-bijelo\belgrade.png">
		<div class="txt-gradovi2"><p>BELGRADE</p></div>
		<img src="Fotke offices\crno-bijelo\brussels.png">
		<div class="txt-gradovi3"><p>BRUSSELS</p></div>
		<img src="Fotke offices\crno-bijelo\bucharest.png">
		<div class="txt-gradovi4"><p>BUCHAREST</p></div>
		</div>
	
		<div class="cs">
		<img src="Fotke offices\crno-bijelo\dubai.png">
		<div class="txt-gradovi1"><p>DUBAI</p></div>
		<img src="Fotke offices\crno-bijelo\hamburg.png ">
		<div class="txt-gradovi2"><p>HAMBURG</p></div>
		<img src="Fotke offices\crno-bijelo\istanbul.png">
		<div class="txt-gradovi3"><p>ISTANBUL</p></div>
		<img src="Fotke offices\crno-bijelo\london.png">
		<div class="txt-gradovi4"><p>LONDON</p></div>
		</div>
		
		<div class="cs">
		<img src="Fotke offices\crno-bijelo\madrid.png">
		<div class="txt-gradovi1"><p>MADRID</p></div>
		<img src="Fotke offices\crno-bijelo\milano.png">
		<div class="txt-gradovi2"><p>MILANO</p></div>
		<img src="Fotke offices\crno-bijelo\moscow.png">
		<div class="txt-gradovi3"><p>MOSCOW</p></div>
		<img src="Fotke offices\crno-bijelo\paris.png">
		<div class="txt-gradovi4"><p>PARIS</p></div>
		</div>
		
		
		<div class="cs1">
		<img src="Fotke offices\crno-bijelo\riga.png">
		<div class="txt-gradovi1"><p>RIGA</p></div>
		<img src="Fotke offices\crno-bijelo\stockholm.png">
		<div class="txt-gradovi2"><p>STOCKHOLM</p></div><br>
-->
    <br><br><br><br>
		</div>
	</div>	
	</div>
	
	
	<div class="final">
		<div class="info">
		<h1>CONTACT</h1>
		<p>Bulevar Petra Cetinjskog 56. <br> 81000 Podgorica, Montenegro</p>
		<p>+382 223 240</p>
		<p>info@amplitudo.me</p>
		</div>
	<img src="images/mapa.png">
	</div><br><br>		
	
	<div class="futer">	
	 <?php
    $query = "SELECT * FROM footer1 where id=1";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $kategorija = $red['kategorija'];
        $meni = $red['meni'];
        
        echo "<h3><a href=''>$kategorija</a>";
        echo "<a href='' class='vertikalna'>$meni</a>";
  }
         $query = "SELECT * FROM footer1 where id=2";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $meni = $red['meni'];
        echo "<a href=''>$meni</a>";
         }
           $query = "SELECT * FROM footer1 where id=3";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $meni = $red['meni'];
        echo "<a href=''>$meni</a>";
         }
        ?>
	</div>
	
	<div class="futer2"><br>
	 <?php
    $query = "SELECT * FROM footer2";
    $tabela = mysqli_query($konekcija, $query);
    while($red = mysqli_fetch_assoc($tabela)){
        $tekst = $red['tekst'];
        
        echo "<p>$tekst</p>";    
  }    ?>

	</div>
    </div>
    
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
