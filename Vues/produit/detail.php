
        <?php
        
            $vCouleur= htmlspecialchars($v->getCouleur());
            $vNomProduit= htmlspecialchars($v->getNomProduit());
            $vIdProduit= htmlspecialchars($v->getIdProduit());
            $vQuantite = htmlspecialchars($v->getQuantiteProdStock());
            echo '<p> Couleur du produit ' . $vCouleur . '.</p>';
            echo '<p> Libellé du produit ' . $vNomProduit . '</p>';
            echo '<p> Quantité en stock  ' . $vQuantite .'</p>';
            echo '<p> ID du produit ' . $vIdProduit . '.</p>';
            echo "<div id='ajouter'><a href='index.php?action=created&controller=panier&idProduit=$vIdProduit'>Ajouter</a></div>";
            echo "<div id='retourListProd'><a href='index.php?action=readAll&controller=produit'>Retour à la liste des produits</a></div>";
        ?>
 

