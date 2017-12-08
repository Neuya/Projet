<?php

	require_once (File::build_path(array('Controller','ControllerProduit.php')));
        require_once (File::build_path(array('Controller','ControllerPanier.php')));
        require_once (File::build_path(array('Controller','ControllerCommande.php')));
        require_once (File::build_path(array('Controller','ControllerUtilisateur.php')));

	// On recupère l'action passée dans l'URL
	if(isset($_GET['action'])){
		$action = $_GET['action']; 
	}
	else{
		$action='accueil';
    
	}  
        
        if(isset($_GET['controller'])){
		$controller = $_GET['controller']; 
	}
	else{
		$controller='accueil';
    
	}  
        
        if($action=='accueil' && $controller=='accueil'){
            ControllerProduit::accueil();
        }
                    
        else{         
            $controller_class='Controller'.$controller;
            $tab_class=get_class_methods($controller_class); 
            if(class_exists($controller_class)){

                if(in_array($action,$tab_class)){
                        $controller_class::$action();
                    }
                    else{
                        $controller_class::error();
                    }

            }

            else{
                ControllerProduit::accueil();
            }
        }

?>
