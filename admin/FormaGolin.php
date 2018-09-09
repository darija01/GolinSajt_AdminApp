
<?php
 
$konekcija=mysqli_connect('localhost', 'root', '','golin');

     $greska=null; 
   if(isset($_POST['zakazi'])){    
 
       if(!isset($_POST['ime_i_prezime']) ||strlen($_POST['ime_i_prezime']) == 0){         
            $greska = "Morate unijeti ime i prezime <br>";
             echo $greska;
        }
     else if(!isset($_POST['firma']) ||strlen($_POST['firma']) == 0){         
            $greska = "Niste unijeli naziv firme<br>";
             echo $greska;
        }
     else if(!isset($_POST['mail']) ||strlen($_POST['mail']) == 0){         
            $greska = "Niste unijeli e-mail adresu <br>";
             echo $greska;
        }
        else if(!filter_var(($_POST['mail']), FILTER_VALIDATE_EMAIL)){         
            $greska = "Pogrešno ste unijeli e-mail adresu <br>";
             echo $greska;
        }
        else if(!isset($_POST['telefon']) ||strlen($_POST['telefon']) == 0){         
            $greska = "Niste unijeli broj telefona<br>";
             echo $greska;
        }
        else if(!isset($_POST['datum']) ||strlen($_POST['datum']) == 0){         
            $greska = "Niste unijeli datum sastanka<br>";
             echo $greska;
        }
        else if(!isset($_POST['vrijeme']) ||strlen($_POST['vrijeme']) == 0){         
            $greska = "Niste unijeli vrijeme sastanka<br>";
             echo $greska;
        }
                   if($greska === null){ 
                            
                       $ime_prezime = $_POST['ime_i_prezime'];
                       $firma = $_POST['firma'];
                       $e_mail = $_POST['mail'];
                       $broj_telefona = $_POST['telefon'];
                       $datum = $_POST['datum'];
                       $vrijeme = $_POST['vrijeme'];
                       

                    $unos= "INSERT INTO sastanci(ime_i_prezime, firma, mail, telefon, datum, vrijeme)" .
                    " VALUES ('$ime_prezime','$firma','$e_mail','".$broj_telefona ."','".$datum ."','".$vrijeme ."')";
                       if(mysqli_query($konekcija,$unos)){
                       $poruka = "Zakazali  ste sastanak.";
                        echo $poruka;
                        
                           
                           $to = 'darija.bojanovic@udg.edu.me';
                           $subject = 'Sastanak';
                           $message = $ime_prezime . ' je zakazao sastanak na dan ' . $datum . ' u ' . $vrijeme . 'sati.';
                           

                           mail($to, $subject, $message);

                           
                    
                           header ("Location: FormaGolin.php");
           } else{
              die ("MYSQL Error: " . mysqli_error($konekcija)); 
           } 
}
   }

    
?>


