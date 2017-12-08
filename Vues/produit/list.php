
        <?php
<<<<<<< HEAD
=======
        echo "<article>";
        echo"<form method='get' action='index.php'>";
         echo "<input type='hidden' name='action' value='recherche'>";
         echo "<input type='hidden' name='controller' value='produit'>";
        echo "<label for='id'>Rechercher un produit </label> :";
        echo "<input type='search' placeholder='Entrez un nom de produit' name='search'>";
        echo "<input type='submit' value='Rechercher' />";
        echo "</form>";
        echo "</article>";
        
>>>>>>> 63ee972ee92377e96cc5aeaaba9a02e167a13b15
        
        echo "<p><strong>Pour ajouter un produit à votre  panier veuillez cliquer dessus</strong></p> ";
        
        foreach ($tab_v as $v){
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vCouleurProduit = htmlspecialchars($v->getCouleur());
            $vQuantiteProd = htmlspecialchars($v->getQuantiteProdStock());
            $prixProduit= htmlspecialchars($v->getPrixProd());
            $IDurl=rawurlencode($v->getIdProduit());
           
            if($vQuantiteProd>0)
            {
            echo "<article>";
            echo "<div class='listeproduit'>";
<<<<<<< HEAD
            echo "<div id='lienprod'><a href='index.php?action=read&controller=produit&id=$IDurl'>$vNomProduit de couleur $vCouleurProduit || Prix : $prixProduit € </a></div><div id='quantiteProdStock'><p>Quantite du produit en stock : $vQuantiteProd</p></div> ";
=======
            echo "<div id='lienprod'><a href='index.php?action=read&controller=produit&id=$IDurl'>$vNomProduit || Prix : $prixProduit € </a></div><div id='quantiteProdStock'><p>Quantite du produit en stock : $vQuantiteProd</p></div> ";
            echo "<div id='coulprod'>Couleur : $vCouleurProduit</div>";
>>>>>>> 63ee972ee92377e96cc5aeaaba9a02e167a13b15
            echo "</div>";
            echo "</article>";
            }
        }
        ?>
