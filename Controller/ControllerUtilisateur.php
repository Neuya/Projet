<?php


require_once (File::build_path(array('Modele','ModelUtilisateur.php')));
require_once (File::build_path(array('lib','Security.php')));
require_once (File::build_path(array('lib','Session.php')));

    class ControllerUtilisateur{
    
        
       public static function readAll() {
			$tab_v = ModelUtilisateur::getAllUtilisateur();
			$pagetitle="Liste des utilisateurs";
			$controller="utilisateur";
			$view="list";
			require File::build_path(array("Vues","view.php"));
		}
    
		public static function read() {
			$v = ModelUtilisateur::getUtilisateurbyId($_SESSION["idUtil"]);
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
			$v = ModelUtilisateur::getUtilisateurById($_SESSION["idUtil"]);
			if($v == false){
				ControllerUtilisateur::error();
			}	//"redirige" vers les erreurs
			else{
				ModelUtilisateur::deleteUtilisateurById($_GET["id"]);
				$pagetitle="Compte supprimé";
				$controller="utilisateur";
				$view="deleted";
				require File::build_path(array("Vues","view.php"));
                                session_destroy();
                                session_start();
                                $_SESSION['pseudoUtil']='Visiteur';
                                $_SESSION['idUtil']=2;
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
                public static function update(){
                   
                    $tab= ModelUtilisateur::getUtilisateurbyId($_GET['id']);
                    
                    if($tab == false){ 
                            echo '<script>alert("Cet Utilisateur n"existe pas)</script>';
				ControllerUtilisateur::accueil();
			}	
                    else{
                            
                            $login=$tab->getPseudoUtil();
                            if(Session::is_user($login)){ 
                                 $controller='utilisateur';  
                                 $view='update';
                                 $pagetitle='Mise à jour du compte';
                                 
                                 require(File::build_path(array("Vues","view.php")));
                            }
                            else{
                                
                                echo '<script>alert("Vous n"avez pas le droit de modifier les informations d"un autre compte)</script>';
                                ControllerUtilisateur::accueil();
                            }
                   }
            
                }
                public static function updated(){
                    
                     $controller='utilisateur';  
                     $view='updated';
                     $pagetitle='Information du compte modifié';
                     $v=ModelUtilisateur::getUtilisateurbyLogin($_SESSION['pseudoUtil']);
                     ModelVoiture::update($v);
                     $v->setMarque($_GET['marque']);
                     $v->setImmatriculation($_GET['immat']);
                     $v->setCouleur($_GET['couleur']);
                     $tab_v=ModelVoiture::getAllVoitures();
                     require(File::build_path(array("view","view.php")));
                }
                
               
                public static function connect(){
                    $pagetitle="Connexion";
                    $controller="site";
                    $view="connect";
                    require File::build_path(array("Vues","view.php"));
                }
                
                public static function connected(){
                    if(ModelUtilisateur::checkPassword($_GET['login'],Security::chiffrer($_GET['mdp']))){
                        session_destroy();
                        session_start();
                        $_SESSION['pseudoUtil']=$_GET['login'];
                        $u=ModelUtilisateur::getUtilisateurbyLogin($_SESSION['pseudoUtil']);
                        $_SESSION['idUtil']=$u->getIdUtilisateur();
                        $pagetitle="Bienvenue";
                        $controller="utilisateur";
			$view="connected";
			require File::build_path(array("Vues","view.php"));
                    }
                    else{
                        echo '<script>alert("Adresse email ou mot de passe incorrect")</script>';
                        ControllerUtilisateur::connect();
                        
                    }
                        
                
                }
                
                public static function deconnected(){
                        session_destroy();
                        session_start();
                        $_SESSION['pseudoUtil']='Visiteur';
                        $_SESSION['idUtil']=2;
                        $pagetitle="Deconnecté(e)";
                        $controller="utilisateur";
                        $view="deconnected";
                        require File::build_path(array("Vues","view.php"));
                    
                }
                
                public static function accueil(){
                    
                    $pagetitle="Accueil";
                    $controller="site";
                    $view="Accueil";
                    require File::build_path(array("Vues","view.php"));
                }
       /* 
        create
        
        created
        
        update
        
        error
        
        deleted*/
    }


?>