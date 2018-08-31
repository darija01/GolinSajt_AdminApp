<?php session_start();?>


<?php 

//if(isset($_POST['logout'])){
    
        $_SESSION['username'] = null; 
        $_SESSION['ime'] = null;
        $_SESSION['prezime'] = null;  
   
header("Location: LogIn.php");
//}
?>