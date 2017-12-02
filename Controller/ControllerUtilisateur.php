<?php


require_once (File::build_path(array('Modele','ModelUtilisateur.php')));

    class ControllerUtilisateur{
    
        
       public static function readAll() {
			$tab_v = ModelUtilisateur::getAllUtilisateur();
			$pagetitle="Liste des utilisateurs";
			$controller="utilisateur";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
		public static function read() {
			$v = ModelUtilisateur::getUtilisateurbyId($_GET["id"]);
			if($v == false){
				ControllerUtilisateur::error();
			}	//"redirige" vers les erreurs
			else{
				$pagetitle="Détail de utilisateur";
				$controller="utilisateur";
				$view="detail";   
				require File::build_path(array("Vues","view.php"));
				}  //"redirige" vers la vue
		}
    
		public static function error(){
			$pagetitle="Erreur";
			$controller="utilisateur";
			$view="error";
			require File::build_path(array("Vues","view.php"));
		}
   
	
	
		public static function deleted(){
			$v = ModelUtilisateur::getUtilisateurById($_GET["id"]);
			if($v == false){
				ControllerUtilisateur::error();
			}	//"redirige" vers les erreurs
			else{
				ModelUtilisateur::deleteUtilisateurById($_GET["id"]);
				$pagetitle="utilisateur créée";
				$controller="utilisateur";
				$view="created";
				require File::build_path(array("Vues","view.php"));
			}
		}
                
                 public static function create(){
			$pagetitle="Formulaire d'inscription";
			$controller="utilisateur";
			$view="create";
			require File::build_path(array("Vues","view.php"));
		}
		
		public static function created(){
			if($_GET['mdp']===$_GET['mdp2']){
				$produit = new ModelUtilisateur($_GET['nom'],$_GET['mdp'],$_GET['prenom'],$_GET['age'],$_GET['ville']);
				$produit->save();
				$pagetitle="votre compte à bien été crée";
				$controller="utilisateur";
				$view="created";
				require File::build_path(array("Vues","view.php"));
			}
			else{
				$pagetitle = "error";
				$controller="utilisateur";
				$view="error";
				require File::build_path(array("Vues","view.php"));
			}
		}
       /* 
        create
        
        created
        
        update
        
        error
        
        deleted*/
    }


?>