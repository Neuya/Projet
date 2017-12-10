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
				ModelUtilisateur::deleteUtilisateurById(myGet('id'));
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
			if(myGet('mdp')===myGet('mdp2') && filter_var(myGet('email'),FILTER_VALIDATE_EMAIL) && ModelUtilisateur::checkPseudo(myGet('pseudo'))){
                                $mdpChiffrer=Security::chiffrer(myGet('mdp'));
                                $nonce=Security::generateRandomHex();
				$utilisateur = new ModelUtilisateur(NULL,myGet('nom'),myGet('pseudo'),$mdpChiffrer,myGet('prenom'),myGet('age'),myGet('ville'),0,$nonce);
				$utilisateur->save();
				$pagetitle="Confirmer votre adresse email";
				$controller="utilisateur";
				$view="created";
                                $email='bob@yopmail.fr';
                            
                                $sujet = 'Validation Compte';
                                $message = "<html>"
                                        . "<head>"
                                        . "</head>"
                                        . "<body>"
                                        . "<b>Inscription envoyée !</b>. Cliquer sur le lien ci-dessous ou copier le dans votre naviguateur pour valider votre compte.<br /><br /><a href=\"http://localhost/ProjetPHP/Projet/index.php?action=validate&controller=utilisateur&email=$email&nonce=$nonce/a></body></html>";
                                
                                
                                $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                                $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n";
                                mail($email, $sujet, $message, $headers);
  
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
                   
                    $tab= ModelUtilisateur::getUtilisateurbyId(myGet('id'));
                    
                    if($tab == false){ 
                            echo '<script>alert("Cet Utilisateur nexiste pas")</script>';
				ControllerUtilisateur::accueil();
			}	
                    else{
                            
                            $login=$tab->getPseudoUtil();
                            if(Session::is_user($login) || Session::is_Admin()){ 
                                 $controller="utilisateur";  
                                 $view="update";
                                 $pagetitle="Mise à jour du compte";
                                 
                                 require(File::build_path(array("Vues","view.php")));
                            }
                            else{
                                
                                echo '<script>alert("Vous navez pas le droit de modifier les informations dun autre compte")</script>';
                                ControllerUtilisateur::accueil();
                            }
                    }
                }
             
            
                
              public static function updated(){
                    $user = ModelUtilisateur::getUtilisateurbyLogin($_SESSION['pseudoUtil']);
                    if(myGet('mdp') == "" & myGet('mdp2') =="" ){
                        $user->setPseudoUtil(myGet('pseudo'));
                        $user->setNomUtil(myGet('nom'));
                        $user->setPrenomUtil(myGet('prenom'));
                        $user->setAgeUtil(myGet('age'));
                        $user->setVilleUtil(myGet('ville'));
                        echo'-----------1-------------------';
                        ModelUtilisateur::update($user);
                        $pagetitle = "Compte modifié";
                        $controller = "utilisateur";
                        $view = "updated";
                        require File::build_path(array("Vues", "view.php"));
                    }
                    else{
                        if(myGet('mdp') == myGet('mdp2')){
                            echo'-----------12-------------------';
                            $user->setPseudoUtil(myGet('pseudo'));
                            $user->setNomUtil(myGet('nom'));
                            $user->setPrenomUtil(myGet('prenom'));
                            $user->setAgeUtil(myGet('age'));
                            $user->setVilleUtil(myGet('ville'));
                            $user->setMdpUtil(myGet('mdp'));
                            ModelUtilisateur::update($user);
                            $pagetitle = "Compte modifié";
                            $controller = "utilisateur";
                            $view = "updated";
                            require File::build_path(array("Vues", "view.php"));
                    }
                        else{
                            $pagetitle = "error";
                            $controller = "utilisateur";
                            $view = "error";
                            require File::build_path(array("Vues", "view.php"));
                        }
                    }
                }


                public static function connect(){
                    $pagetitle="Connexion";
                    $controller="site";
                    $view="connect";
                    require File::build_path(array("Vues","view.php"));
                }
                
                public static function connected(){

                    if(ModelUtilisateur::checkPassword(myGet('login'),Security::chiffrer(myGet('mdp')))){
                            $u=ModelUtilisateur::getUtilisateurbyLogin(myGet('login'));
                            if($u->getNonce()==NULL){

                            session_destroy();
                            session_start();
                            $_SESSION['pseudoUtil']=myGet('login');


                            $_SESSION['idUtil']=$u->getIdUtilisateur();
                            
                            if($u->getisAdmin()){
                                $_SESSION['isAdmin']=true;
                            }
                            else{
                                $_SESSION['isAdmin']=false; 
                            }

                            $pagetitle="Bienvenue";
                            $controller="utilisateur";
                            $view="connected";
                            require File::build_path(array("Vues","view.php"));
                        
                        
                             echo '<script>alert("Vous navez pas valider votre compte avec votre adresse email")</script>';

                            
                    }
                    else{

                        echo '<script>alert("Login ou mot de passe incorrect")</script>';

                        ControllerUtilisateur::connect();
                        
                    }
  
                  }
                }
                
                public static function validate(){
                    $u= ModelUtilisateur::getUtilisateurbyLogin(myGet('login'));
                    if($u==false){
                        ControllerUtilisateur::error();
                    }
                    else if(myGet('nonce')==$u->getNonce()){
                        $u->setNonceNULL();
                        $pagetitle="Confirmation réussie";
                        $controller="utilisateur";
                        $view="confirmed";
                        require File::build_path(array("Vues","view.php"));
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