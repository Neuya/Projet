<?php

	require_once (File::build_path(array('Controller','ControllerProduit.php')));
        require_once (File::build_path(array('Controller','ControllerPanier.php')));

	// On recupère l'action passée dans l'URL
	if(isset($_GET['action'])){
		$action = $_GET['action']; 
	}
	else{
		$action='readAll';
    
	}

	$tab_prod=get_class_methods('ControllerProduit');
        $tab_panier= get_class_methods('ControllerPanier');
	// Appel de la méthode statique $action de ControllerProduit
	if(in_array($action,$tab_prod)){
		ControllerProduit::$action(); 
	}
        else if(in_array($action,$tab_panier))
        {
            ControllerPanier::$action();
        }
	else{
		ControllerProduit::error();
	}
?>
