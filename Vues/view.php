<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="../Css/style.css">
    </head>
    <body>
        <div id="Menu">
			<a class="active" href="index.php?action=readAll">Accueil</a>
            <a href="index.php?action=readAll" >Présentation du produit</a>
            <a href="index.php?action=readAll&controller=produit" >Liste des produits</a>
            <a href="index.php?action=readAll&controller=utilisateur" >Gestion du compte</a>
            <a href="index.php?action=readAllPanier&controller=panier" >Mon panier</a>
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
