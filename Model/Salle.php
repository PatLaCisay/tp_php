<?php
/**
 * Description of Salle
 *
 * @author PatLaCisay
 */
class Salle {
    
    /**
     * Attributs
     */
    public $Id;
    public $Nom;
    
    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     * 
     * @return type
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * 
     * @return type nom
     */
    public function getNom(){
        return $this->Nom;
    }
}