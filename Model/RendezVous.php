<?php



/**
 * Description of RendezVous
 *
 * @author PatLaCisay
 */
class RendezVous {
    
    /**
     * Attributs
     */
    public $Id_Rendez_Vous;
    public $Date_Rendez_Vous;
    public $Salle_Id;
    public $Id_Patient;
    public $Id_Medecin;
    
    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     * 
     * @return type
     */
    public function getId_Rendez_Vous() {
        return $this->Id_Rendez_Vous;
    }

    /**
     * 
     * @return type
     */
    public function getDate_Rendez_Vous() {
        return $this->Date_Rendez_Vous;
    }

    /**
     * 
     * @return type
     */
    public function getSalle_Id() {
        return $this->Salle_Id;
    }

    /**
     * 
     * @param type $Id_Rendez_Vous
     */
    public function setId_Rendez_Vous($Id_Rendez_Vous) {
        $this->Id_Rendez_Vous = $Id_Rendez_Vous;
    }

    /**
     * 
     * @param type $Date_Rendez_Vous
     */
    public function setDate_Rendez_Vous($Date_Rendez_Vous) {
        $this->Date_Rendez_Vous = $Date_Rendez_Vous;
    }

    /**
     * 
     * @param type $Salle_Id
     */
    
    public function setSalle($Salle_Id) {
        $this->Salle_Id = $Salle_Id;
    }

    /**
     * 
     * @return type
     */
    public function getId_Patient() {
        return $this->Id_Patient;
    }

    /**
     * 
     * @param type $Id_Patient
     */    
    public function setId_Patient($id) {
        $this->Id_Patient=$id;
    }

    /**
     * 
     * @return type
     */
    public function getId_Medecin() {
        return $this->Id_Medecin;
    }

    /**
     * 
     * @param type $Id_Medecin
     */    
    public function setId_Medecin($id) {
        $this->Id_Medecin=$id;
    }
    
}
