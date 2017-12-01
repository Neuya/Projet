<?php 
session_start();
?>


<?php
        // put your code here
    
       
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'File.php';
        require_once (File::build_path(array('Controller','routeur.php')));
        
        
        
        $_SESSION['pseudoUtil']='Rubis';
        $_SESSION['idUtil']='2';
       
 ?>
        
 

