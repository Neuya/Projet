<?php 
require_once (File::build_path(array('Modele','ModelCommande.php')));

    class ControllerCommande{
		
		public static function readAll() {
			$tab_panier = ModelCommande::getAllCommande($_SESSION['idUtil']);
			$pagetitle="Liste des produits de vos commandes";
			$controller="commande";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
    
		public static function error(){
			$pagetitle="Erreur";
			$controller="panier";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
    
		
	
		public static function created(){
                        $idCom=ModelCommande::getIdCommandeDeUtil($_SESSION['idUtil']);
                        $produit_commande= new ModelCommande($idCom,$_GET['idProduit'],$_SESSION['idUtil'],1);
                        $produit_commande->save();
			$pagetitle="Produits ajoutés a votre commande";
			$controller="commande";
			$view="created";
			require File::build_path(array("Vues","view.php"));
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