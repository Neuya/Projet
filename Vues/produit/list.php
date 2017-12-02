
        <?php
        
        echo " Pour ajouter un produit à votre  panier veuillez cliquer dessus ";
        
        foreach ($tab_v as $v){
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vCouleurProduit = htmlspecialchars($v->getCouleur());
            $vQuantiteProd = htmlspecialchars($v->getQuantiteProdStock());
            $prixProduit= htmlspecialchars($v->getPrixProd());
            $IDurl=rawurlencode($v->getIdProduit());
           
            
            echo "<article>";
            echo "<div class='listeproduit'>";
            echo "<div id='lienprod'><a href='index.php?action=read&controller=produit&id=$IDurl'>$vNomProduit de couleur $vCouleurProduit || Prix : $prixProduit € </a></div><div id='quantiteProdStock'><p>Quantite du produit en stock : $vQuantiteProd</p></div> ";
            echo "</div>";
            echo "</article>";
        }
        ?>
