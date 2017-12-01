<?php
  require_once File::build_path(array("Modele","Model.php"));
  

  class ModelPanier{
    private $idProduit;
    private $idUtil;
    private $quantite;
    
    
    //Guetters et Setters
    public function getIdProduit(){
      return $this->idProduit;
    }
    public function getIdUtil(){
      return $this->idUtil;
    }
    public function getQuantite(){
      return $this->Quantite;
    }
      
    public function setIdProduit($idProduit2){
      $this->idProduit=$idProduit2;
    }
    
    public function setIdUtil($idUtil2){
      $this->idUtil=$idUtil2;
    }
    public function setQuantite($quantite2){
      $this->quantite=$quantite2;
    }
    
    
    //Constructeur
    public function __construct($idProd = NULL, $idUt = NULL, $quant = NULL){
      if (!is_null($idProd) && !is_null($idUt) && !is_null($quant)) {
        $this->idProduit = $idProd;
        $this->idUtil = $idUt;
        $this->quantite = $quant;
      }
    }
    
    //Fonctions
    
    public static function getAllProduitDuPanier($idUtili){
      $rep = Model::$pdo->query("SELECT idProduit,Quantite FROM Panier WHERE idUtil=$idUtili");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }

    public function deleteProduitById($idProduit,$idUtili){
      $rep = Model::$pdo->query("DELETE FROM Panier WHERE idProduit=$idProduit AND idUtil=$idUtili");

    }
    
    public function incrementeQuantite($idProduit,$idUtil)
    {
        $rep = Model::$pdo->query("UPDATE Panier SET Quantite=Quantite+1 WHERE idProduit=$idProduit AND idUtil=$idUtil");
    }
    
    public function decrementeQuantite($idProduit,$idUtil)
    {
        $rep = Model::$pdo->query("UPDATE Panier SET Quantite=Quantite-1 WHERE idProduit=$idProduit AND idUtil=$idUtil");
    }
    
    public function save(){
      $sql = "INSERT INTO Panier (idProduit,idUtil,Quantite) VALUES (:idProduit,:idUtil,:quantite)";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "idProduit" => $this->idProduit,
        "idUtil" => $this->idUtil,
        "quantite" => $this->quantite,
      );
      $req_prep->execute($values);
    }
    public function update(){
    }
  }
    
?>
