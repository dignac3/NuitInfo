<?php
/**
*
*/
class CitationManager
{
  private $db;
  function __construct($db)
  {
    $this->db = $db;
  }

  public function deuxDernieresCitationsValides(){
    $requete = $this->db->prepare('SELECT * FROM citation WHERE cit_valide=1 AND cit_date_valide is not null ORDER BY cit_date DESC LIMIT 2');
    $requete->execute();
    while ($citation = $requete->fetch(PDO::FETCH_OBJ)) {
      $listeCitations[] = new Citation ($citation);
    }
    $requete->closeCursor();

    return $listeCitations;
  }

  public function list(){
    $requete = $this->db->prepare('SELECT * FROM citation ORDER BY cit_date');
    $requete->execute();
    while ($citation = $requete->fetch(PDO::FETCH_OBJ)) {
      $listeCitations[] = new Citation ($citation);
    }
    $requete->closeCursor();

    return $listeCitations;
  }

  public function longueur(){
    $requete = $this->db->prepare('SELECT COUNT(*) as Nombre FROM citation');
    $requete->execute();

    $longueur = $requete->fetch(PDO::FETCH_ASSOC);

    return $longueur["Nombre"];
  }

  public function ajouter_citation($cit,$etu){

    $requete = $this->db->prepare("Insert Into citation(per_num, cit_date, cit_libelle, per_num_etu) VALUES (:nom,:date,:lib,:etu)");
    $requete->bindValue(':nom',$cit->get_per_num());
    $requete->bindValue(':date',$cit->get_cit_date());
    $requete->bindValue(':lib',$cit->get_cit_libelle());
    $requete->bindValue(':etu',$etu);

    $requete->execute();
  }

  public function est_valide($cit_num){
    $requete = $this->db->prepare("Select cit_num FROM citation Where cit_num=$cit_num AND cit_valide=1 AND cit_date_valide is not null");
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      return true;
    }else {
      return false;
    }
  }
  public function rechercher_citations($prof, $date,$moyenne){
    $i = 0;
    $conditions = "";
    //echo "pernum :".$prof.", date:".$date.", moyenne:".$moyenne."<br>";
    if (!empty($prof)) {
      $i++;
      $conditions = "c.per_num=$prof ";//Ne pas oublier cotes
    }
    if (!empty($date)) {
      if ($i >= 1) {
        $conditions .= "and ";
      }
        $conditions .= "cit_date='$date' ";//Ne pas oublier cotes
        $i++;
    }
    if (!empty($moyenne)) {
      if ($i >= 1) {
        $conditions .= "and ";
      }
        $conditions .= "AVG(vot_valeur)=$moyenne ";//Ne pas oublier cotes
        $i++;
    }
    if ($i !== 0) {
      $conditions = "where ".$conditions;
    }
    // SELECT
     $requete = $this->db->prepare("Select c.cit_num ,cit_libelle, cit_date FROM
                                   citation c Join vote v ON (c.cit_num = v.cit_num)
                                   $conditions
                                   Group by c.cit_num");
    $requete->execute();
    while ($citation = $requete->fetch(PDO::FETCH_ASSOC)) {
      $listeCitations[] = new Citation ($citation);
    }
    $requete->closeCursor();

    return $listeCitations;
  }

  public function get_cit_libelle_by_cit_num($cit_num){
    $requete = $this->db->prepare("Select cit_libelle from citation where cit_num=$cit_num");
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    return $result["cit_libelle"];
  }

  public function get_cit_dates(){
    $requete = $this->db->prepare('SELECT DISTINCT cit_date FROM citation ORDER BY cit_date');
    $requete->execute();
    while ($citation = $requete->fetch(PDO::FETCH_OBJ)) {
      $listeDates[] = new Citation ($citation);
    }
    $requete->closeCursor();

    return $listeDates;
  }


}
?>
