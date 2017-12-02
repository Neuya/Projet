<?php
require_once (File::build_path(array('Modele','ModelPanier.php')));

    class ControllerPanier{
		
		public static function readAll() {
			$tab_panier = ModelPanier::getAllProduitDuPanier($_SESSION['idUtil']);
			$pagetitle="Liste des produits de votre panier";
			$controller="panier";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
    
		public static function errorPanier(){
			$pagetitle="Erreur";
			$controller="produit";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
    
		
	
		public static function createdPanier(){
			/*$produit = new ModelPanier($_GET['id'],$_GET['nomproduit'],$_GET['couleur']);
			$produit->save();*/
                        $produit_panier= new ModelPanier($_GET['idProduit'],$_SESSION['idUtil'],1);
                        $produit_panier->save();
			$pagetitle="Produit ajouté";
			$controller="panier";
			$view="created";
			//$tab_v = ModelProduit::getAllProduit();
			require File::build_path(array("Vues","view.php"));
		}
                
                public static function incrementeQuant()
                {
                    ModelPanier::incrementeQuantite($_GET["idProduit"],$_SESSION['idUtil']);
                    ControllerPanier::readAllPanier();
                    
                }
                
                public static function decrementeQuant()
                {
                    ModelPanier::decrementeQuantite($_GET["idProduit"],$_SESSION['idUtil']);
                    ControllerPanier::readAllPanier();
                }
	
		public static function deletedPanier(){
			$v = ModelProduit::getProduitById($_GET["idProduit"]);
			if($v == false){
				ControllerPanier::error();
			}	//"redirige" vers les erreurs
			else{
				ModelPanier::deleteProduitById($_GET["idProduit"],$_SESSION['idUtil']);
				$pagetitle="Produit enlevé";
				$controller="panier";
				$view="deleted";
				require File::build_path(array("Vues","view.php"));
			}
		}
    }
?>

