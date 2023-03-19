<?php



/**
 * Description of Consultation
 *
 * @author PatLaCisay
 */
class Consultation {
    
    /**
     * Attributs
     */
    public $Id_Consultation;
    public $Date_Consultation;
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
    public function getId_Consultation() {
        return $this->Id_Consultation;
    }

    /**
     * 
     * @return type
     */
    public function getDate_Consultation() {
        return $this->Date_Consultation;
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
     * @param type $Id_Consultation
     */
    public function setId_Consultation($Id_Consultation) {
        $this->Id_Consultation = $Id_Consultation;
    }

    /**
     * 
     * @param type $Date_Consultation
     */
    public function setDate_Consultation($Date_Consultation) {
        $this->Date_Consultation = $Date_Consultation;
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
