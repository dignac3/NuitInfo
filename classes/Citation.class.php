<?php
/**
 *
 */
class Citation
{
  private $cit_date;
  private $cit_date_depo;
  private $cit_date_valide;
  private $cit_libelle;
  private $cit_num;
  private $cit_valide;
  private $per_num;
  private $per_num_etu;
  private $per_num_valide;

  function __construct($valeurs = array())
  {
    if (!empty($valeurs)) {
      $this->affecte($valeurs);
    }
  }

  public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur) {
			switch ($attribut) {
				case 'cit_date':
					$this->set_cit_date($valeur);
					break;
        case 'cit_date_depo':
  				$this->set_cit_date_depo($valeur);
  				break;
        case 'cit_date_valide':
  				$this->set_cit_date_valide($valeur);
  				break;
        case 'cit_libelle':
    			$this->set_cit_libelle($valeur);
    			break;
        case 'cit_num':
  				$this->set_cit_num($valeur);
  				break;
        case 'cit_valide':
    			$this->set_cit_valide($valeur);
    			break;
        case 'per_num':
    			$this->set_per_num($valeur);
    			break;
        case 'per_num_etu':
      		$this->set_per_num_etu($valeur);
      		break;
        case 'per_num_valide':
          $this->set_per_num_valide($valeur);
          break;
			}
		}
	}

  public function get_cit_date(){
    return $this->cit_date;
  }

  public function set_cit_date($cit_date){
    $this->cit_date = $cit_date;
  }

  public function get_cit_date_depo(){
    return $this->cit_date_depo;
  }

  public function set_cit_date_depo($cit_date_depo){
    $this->cit_date_depo = $cit_date_depo;
  }

  public function get_cit_date_valide(){
    return $this->cit_date_valide;
  }

  public function set_cit_date_valide($cit_date_valide){
    $this->cit_date_valide = $cit_date_valide;
  }

  public function get_cit_libelle(){
    return $this->cit_libelle;
  }

  public function set_cit_libelle($cit_libelle){
    $this->cit_libelle = $cit_libelle;
  }

  public function get_cit_num(){
    return $this->cit_num;
  }

  public function set_cit_num($cit_num){
    $this->cit_num = $cit_num;
  }

  public function get_cit_valide(){
    return $this->cit_valide;
  }

  public function set_cit_valide($cit_valide){
    $this->cit_valide= $cit_valide;
  }

  public function get_per_num(){
    return $this->per_num;
  }

  public function set_per_num($per_num){
    $this->per_num = $per_num;
  }

  public function get_per_num_etu(){
    return $this->per_num_etu;
  }

  public function set_per_num_etu($per_num_etu){
    $this->per_num_etu = $per_num_etu;
  }

  public function get_per_num_valide(){
    return $this->per_num_valide;
  }

  public function set_per_num_valide($per_num_valide){
    $this->per_num_valide = $per_num_valide;
  }

} ?>
