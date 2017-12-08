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
    
    
		public static function error(){
			$pagetitle="Erreur";
			$controller="panier";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
                
                public static function create()
                {
                    $v=ModelProduit::getProduitbyId($_GET['idProduit']);
                    $pagetitle="Confirmation de l'ajout";
                    $controller="panier";
                    $view="create";
                    require File::build_path(array("Vues","view.php"));
                }
		
	
		public static function created(){
                        $produit_panier= new ModelPanier($_GET['idProduit'],$_SESSION['idUtil'],$_GET['quantite']);
                        $produit_panier->save();
			$pagetitle="Produit ajouté";
			$controller="panier";
			$view="created";
			require File::build_path(array("Vues","view.php"));
                }
                
                public static function update()
                {
                     $idUtili=$_SESSION['idUtil'];
                     $idProduit=$_GET['idProduit'];
                     $quantiteProd=$_GET['quantite'];
                     ModelPanier::update($idUtili,$idProduit,$quantiteProd);
                     $pagetitle="Produit ajouté";
                     $controller="panier";
                     $view="updated";
                     require File::build_path(array("Vues","view.php"));
                }
                
                public static function incrementeQuant()
                {
                    ModelPanier::incrementeQuantite($_GET["idProduit"],$_SESSION['idUtil']);
                    ControllerPanier::readAll();
                    
                }
                
                public static function decrementeQuant()
                {
                    ModelPanier::decrementeQuantite($_GET["idProduit"],$_SESSION['idUtil']);
                    ControllerPanier::readAll();
                }
	
		public static function deleted(){
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

