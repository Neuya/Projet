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
		$action='Accueil';
    
	}

	$tab_prod=get_class_methods('ControllerProduit');
        $tab_panier= get_class_methods('ControllerPanier');
        $tab_commande = get_class_methods('ControllerCommande');
        $tab_utilisateur = get_class_methods('ControllerUtilisateur');
	// Appel de la méthode statique $action de ControllerProduit
	if(in_array($action,$tab_prod)){
		ControllerProduit::$action(); 
	}
        else if(in_array($action,$tab_panier))
        {
            ControllerPanier::$action();
        }
        else if(in_array($action,$tab_commande))
        {
            ControllerCommande::$action();
        }
        else if(in_array($action,$tab_utilisateur))
        {
            ControllerUtilisateur::$action();
        }
	else{
		if($action=="Accueil")
                {
                    $pagetitle='Accueil';
                    $controller='site';
                    $view='Accueil';
                    require_once (File::build_path(array('Vues','view.php')));
                }
	}
?>
