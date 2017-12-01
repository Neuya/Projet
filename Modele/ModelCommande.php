<?php 

require_once File::build_path(array("Modele","Model.php"));
  

  class ModelCommande{
    
    private $idCommande;
    private $idProduit;
    private $idUtil;
    private $quantiteProduit;
    
    
    
    //Guetters et Setters
    
    public function getIdCommande()
    {
        return $this->idCommande;
    }
    public function getIdProduit(){
      return $this->idProduit;
    }
    public function getIdUtil(){
      return $this->idUtil;
    }
    public function getQuantite(){
      return $this->quantiteProduit;
    }
      
    public function setIdProduit($idProduit2){
      $this->idProduit=$idProduit2;
    }
    
    public function setIdUtil($idUtil2){
      $this->idUtil=$idUtil2;
    }
    public function setQuantite($quantite2){
      $this->quantiteProduit=$quantite2;
    }
    
    public function setIdCommande($id)
    {
        $this->idCommande=$id;
    }
    
    //Constructeur
    public function __construct($idCom=NULL,$idProd = NULL, $idUt = NULL, $quant = NULL){
      if (!is_null($idCom) && !is_null($idProd) && !is_null($idUt) && !is_null($quant)) {
        $this->idCommande=$idCom;
        $this->idProduit = $idProd;
        $this->idUtil = $idUt;
        $this->quantiteProduit = $quant;
      }
    }
    
    //Fonctions
    
    public static function getAllCommande($îdUtili)
    {
      $rep = Model::$pdo->query("SELECT idCommande FROM Panier WHERE idUtil=$idUtili");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }
    
    public static function getAllProduitCommande($idCom,$idUtili){
      $rep = Model::$pdo->query("SELECT idProduit,quantiteProduit FROM Panier WHERE idUtil=$idUtili AND idCommande=$idCom");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
      $tab_obj = $rep->fetchAll();
      return $tab_obj;
    }

    
    
    
    
    public function save(){
      $sql = "INSERT INTO Commande (idCommande,idProduit,idUtil,quantiteProduit) VALUES (:idCommande,:idProduit,:idUtil,:quantite)";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "idCommande" => $this->idCommande,
        "idProduit" => $this->idProduit,
        "idUtil" => $this->idUtil,
        "quantite" => $this->quantite,
      );
      $req_prep->execute($values);
    }
    
  }
    