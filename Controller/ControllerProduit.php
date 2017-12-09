<?php
require_once (File::build_path(array('Modele','ModelProduit.php'))); 






    class ControllerProduit{
		
		public static function readAll() {
			$tab_v = ModelProduit::getAllProduit();
			$pagetitle="Liste des produits";
			$controller="produit";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
		public static function read() {
			$v = ModelProduit::getProduitbyId($_GET["id"]);
			if($v == false){
				ControllerProduit::error();
			}	//"redirige" vers les erreurs
			else{
				$pagetitle="Détail du produit";
				$controller="produit";
				$view="detail";   
				require File::build_path(array("Vues","view.php"));
				}  //"redirige" vers la vue
		}
    
		public static function error(){
			$pagetitle="Erreur";
			$controller="produit";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
    
		public static function create(){
                    
                        if(Session::is_admin())
                        {
			$pagetitle="Formulaire produit";
			$controller="produit";
			$view="create";
                        }
                        else
                        {
                            $pagetitle="Oups!";
                            $controller="site";
                            $view="notadmin";
                        }
			require File::build_path(array("Vues","view.php"));
		}
	
		public static function created(){
			$produit = new ModelProduit($_GET['id'],$_GET['nomproduit'],$_GET['couleur'],$_GET['quantite'],$_GET['prix']);
			$produit->save();
			$pagetitle="produit créé";
			$controller="produit";
			$view="created";
			$tab_v = ModelProduit::getAllProduit();
			require File::build_path(array("Vues","view.php"));
		}
                
                
                public static function delete()
                {
                    if (Session::is_admin())
                    {
                    $prod = ModelProduit::getProduitbyId($_GET["id"]);
                    $vQuantite=$prod->getQuantiteProdStock();
                    $vNomProduit= $prod->getNomProduit();
                    $pagetitle="Confirmation";
                    $controller="produit";
                    $view="delete";
                    }
                    else{
                            $pagetitle="Oups!";
                            $controller="site";
                            $view="notadmin";  
                    }
                    require File::build_path(array("Vues","view.php"));
                }
	
		public static function deleted(){
			$v = ModelProduit::getProduitById($_GET["id"]);
			if($v == false){
				ControllerProduit::error();
			}	//"redirige" vers les erreurs
			else{
                                $prod = ModelProduit::getProduitbyId($_GET["id"]);
                                $vQuantite=$prod->getQuantiteProdStock();
                                $vNomProduit= $prod->getNomProduit();
				ModelProduit::deleteProduitById($_GET["id"]);
				$pagetitle="produit supprimé";
				$controller="produit";
				$view="deleted";
				require File::build_path(array("Vues","view.php"));
			}
		}
                
                public static function accueil(){
                    
                    $pagetitle="Accueil";
                    $controller="site";
                    $view="Accueil";
                    require File::build_path(array("Vues","view.php"));
                }
                

                public static function recherche()
                {
                    $search = rawurldecode($_GET['search']);
                    $tab_s = ModelProduit::findProduit($search);
                    $pagetitle="Résultats de votre recherche";
                    $controller="produit";
                    $view="search";
                    require File::build_path(array("Vues","view.php"));
                }
                

    }
?>
