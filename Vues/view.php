<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="Css/style.css">
    </head>
    <body>
        <div id="Menu">
            <a class="active" href="index.php?">Accueil</a>
            <a href="index.php?action=readAll&controller=produit" >Liste des produits</a>
            <a href="index.php?action=read&controller=utilisateur" >Gestion du compte</a>

            <a href="index.php?action=readAll&controller=panier" >Mon Panier</a>


            <a href="index.php?action=readAll&controller=commande">Mes Commandes</a>
            <?php 
                if($_SESSION['pseudoUtil']=='Visiteur'){
                   echo "<a href=index.php?action=connect&controller=utilisateur>Se Connecter</a>"; 
                   echo "<a href=index.php?action=create&controller=utilisateur>S'inscrire</a>";
                   }  
                if($_SESSION['pseudoUtil']!='Visiteur'){
                   echo "<a href=index.php?action=deconnected&controller=utilisateur>Se Déconnecter</a>";               
                   }  
                
            ?>
            
            
            <?php echo "<p class='login'>Bienvenue ". $_SESSION['pseudoUtil'] ."</p>"; ?>
        </div>

           <article>
			<h1><?php echo $pagetitle; ?></h1>
           </article>

   
       
        <article>
       <?php
            
            $filepath = File::build_path(array("Vues", $controller, "$view.php"));
            require $filepath; 
         ?>
        </article> 
        
     
    </body>
    <footer>
            <div id="textfoot"> Site de Ecommerce réalisé par OZIOL Raphaël, GILOT Simon, ROS Yann.</div>                                                                                     
        </footer>

</html>
