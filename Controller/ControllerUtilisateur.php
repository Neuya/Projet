<?php


require_once (File::build_path(array('Modele','ModelUtilisateur.php')));
require_once (File::build_path(array('lib','Security.php')));

    class ControllerUtilisateur{
    
        
       public static function readAll() {
			$tab_v = ModelUtilisateur::getAllUtilisateur();
			$pagetitle="Liste des utilisateurs";
			$controller="utilisateur";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
		public static function read() {
			$v = ModelUtilisateur::getUtilisateurbyId($_SESSION["pseudoUtil"]);
			if($v == false){
				ControllerUtilisateur::error();
			}
                        else if($_SESSION["idUtil"]==2){
                            
                        }
			else{
				$pagetitle="Information de votre compte";
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
                                $mdpChiffrer=Security::chiffrer($_GET['mdp']);
				$utilisateur = new ModelUtilisateur(NULL,$_GET['nom'],$_GET['pseudo'],$mdpChiffrer,$_GET['prenom'],$_GET['age'],$_GET['ville']);
				$utilisateur->save();
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
                public static function update(){}
                public static function updated(){}
                
                public static function connect(){
                    $pagetitle="Connection";
                    $controller="site";
                    $view="connect";
                    require File::build_path(array("Vues","view.php"));
                }
                
                public static function connected(){
                    if(ModelUtilisateur::checkPassword($_GET['login'],Security::chiffrer($_GET['mdp']))){
                        session_destroy();
                        session_start();
                        $_SESSION['pseudoUtil']=$_GET['login'];
                        $u=ModelUtilisateur::getUtilisateurbyId($_SESSION['pseudoUtil']);
                        $_SESSION['idUtil']=$u->getIdUtilisateur();
                        $pagetitle="Gestion de votre compte";
                        $controller="utilisateur";
			$view="detail";
			require File::build_path(array("Vues","view.php"));
                    }
                    else{
                        ControllerUtilisateur::connect();
                        
                    }
                        
                
                }
                
                public static function deconnected(){
                        session_destroy();
                        session_start();
                        $_SESSION['pseudoUtil']='Visiteur';
                        $_SESSION['idUtil']=2;
                        ControllerProduit::accueil();
                    
                }
       /* 
        create
        
        created
        
        update
        
        error
        
        deleted*/
    }


?>