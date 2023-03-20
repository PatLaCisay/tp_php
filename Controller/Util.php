<?php

/**
 * Description of Util
 *
 * @author Amin
 */

include '../Model/Utilisateur.php';
include '../Model/Secretaire.php';
include '../Model/Medecin.php';
include '../Model/Salle.php';
include '../Model/RendezVous.php';
include '../Model/Patient.php';
include '../Model/Consultation.php';

class Util {
    
    public $serveur = "localhost";
    public $base = "cabinet_medical";
    public $usr =  "root";
    public $pass = "";
    public $mysqli;
    
    /**
     * 
     * @param type $Login
     * @param type $Passwd
     * @return \Utilisateur
     */
    public function getUtilisateur($Login, $Passwd){
        
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Login = $ligne['Login'];
                    $_Passwd = $ligne['Password'];
                    
                    if( ($Login == $_Login) && ($Passwd == $_Passwd) )
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Passwd'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Utilisateur
     */
    public function getUtilisateurById($Id){
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur WHERE Id_Utilisateur='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Utilisateur'];
                    
                    if(($Id == $_Id))
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Password'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Secretaire
     */
    public function getSecretaireByID($Id){
        $Secretaire = NULL;
        
        $Query = "SELECT * FROM secretaire WHERE Id_Secretaire='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Secretaire'];
                    
                    if(($Id == $_Id))
                    {
                         $Secretaire = new Secretaire();
                         $Secretaire->Id_Secretaire = $ligne['Id_Secretaire'];
                         $Secretaire->Nom_Secretaire = $ligne['Nom_Secretaire'];
                         $Secretaire->Prenom_Secretaire = $ligne['Prenom_Secretaire'];
                         break;
                    }
                }

            }
        
        }
        return $Secretaire;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Medecin
     */
    public function getMedecinByID($Id){
        $Medecin = NULL;
        
        $Query = "SELECT * FROM medecin WHERE Id_Medecin='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Medecin'];
                    
                    if(($Id == $_Id))
                    {
                         $Medecin = new Medecin();
                         $Medecin->Id_Medecin = $ligne['Id_Medecin'];
                         $Medecin->Nom_Medecin = $ligne['Nom_Medecin'];
                         $Medecin->Prenom_Medecin = $ligne['Prenom_Medecin'];
                         break;
                    }
                }

            }
        
        }
        return $Medecin;
    }
    /**
     * 
     * @param type $Id
     * @return \Medecin
     */
    public function getMedecinByName($name){
        $Medecin = NULL;
        
        $Query = "SELECT * FROM `medecin` WHERE `Nom_Medecin`='".$name."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_name = $ligne['Nom_Medecin'];
                    
                    if(($name == $_name))
                    {
                         $Medecin = new Medecin();
                         $Medecin=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $Medecin;
    }
   /**
     * 
     * @param type $Id
     * @return \Patient
     */
    public function getPatientByID($Id){
        $Patient = NULL;
        
        $Query = "SELECT * FROM patient WHERE Id_Patient='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Patient'];
                    
                    if(($Id == $_Id))
                    {
                         $Patient = new Patient();
                         $Patient=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $Patient;
    }
       /**
     * 
     * @param type $Id
     * @return \Consultation
     */
    public function getConsultationByID($Id){
        $Consultation = NULL;
        
        $Query = "SELECT * FROM consultation WHERE Id_Consultation='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Consultation'];
                    
                    if(($Id == $_Id))
                    {
                         $Consultation = new Consultation();
                         $Consultation=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $Consultation;
    }
    /**
     * 
     * @param type $Id
     * @return \Medecin
     */
    public function getPatientByName($name){
        $Patient = NULL;
        
        $Query = "SELECT * FROM `patient` WHERE `Nom_Patient`='".$name."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_name = $ligne['Nom_Patient'];
                    
                    if(($name == $_name))
                    {
                         $Patient = new Patient();
                         $Patient=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $Patient;
    }
    
    public function getRdvByDate($date){
        $rdv = NULL;
        
        $Query = "SELECT * FROM `rendez_vous` WHERE `Date_Rendez_Vous`='".$date."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_date = $ligne['Date_Rendez_Vous'];
                    
                    if(($date == $_date))
                    {
                         $rdv = new RendezVous();
                         $rdv=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $rdv;
    }
    public function getConsultationByDate($date){
        $rdv = NULL;
        
        $Query = "SELECT * FROM `consultation` WHERE `Date_Consultation`='".$date."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_date = $ligne['Date_Consultation'];
                    
                    if(($date == $_date))
                    {
                         $rdv = new Consultation();
                         $rdv=$ligne;
                         break;
                    }
                }

            }
        
        }
        return $rdv;
    }
    /**
     * 
     * @param type $Id
     * @return \Salle
     */
    public function getSalleById($Id){
        $Salle = NULL;
        
        $Query = "SELECT * FROM salle WHERE id='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['id'];
                    
                    if(($Id == $_Id))
                    {
                         $Salle = new Salle();
                         $Salle= $ligne;
                         break;
                    }
                }

            }
        
        }
        return $Salle;
    }
    
    public function findAllPatients(){
        $patients=[];

        $Query = "SELECT * FROM patient";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($patients,$ligne);
                }

            }
        
        }
        return $patients;


    }


    public function findMyPatients($id){
        $patients=[];

        $Query = "SELECT * FROM patient WHERE Id_Medecin='".$id."'";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($patients,$ligne);
                }

            }
        
        }
        return $patients;


    }

    public function findAllRdv(){
        $rdvs=[];

        $Query = "SELECT * FROM rendez_vous ORDER BY Date_Rendez_Vous DESC";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($rdvs,$ligne);
                }

            }
        
        }
        return $rdvs;
    }

    public function findAllConsultation(){
        $consultations=[];

        $Query = "SELECT * FROM consultation ORDER BY Date_Consultation DESC";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($consultations,$ligne);
                }

            }
        
        }
        return $consultations;
    }
    public function findAllMedecins(){
        $medecins=[];

        $Query = "SELECT * FROM medecin";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($medecins,$ligne);
                }

            }
        
        }
        return $medecins;

    }

    public function findAllSalles(){
        $salles=[];

        $Query = "SELECT * FROM salle";
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    array_push($salles,$ligne);
                }

            }
        
        }
        return $salles;


    }
    
    
    /**
     * 
     */
    public function dbConnection(){
        $this->mysqli= new mysqli($this->serveur, $this->usr, $this->pass, $this->base);
        $this->mysqli->set_charset("utf8");
    }
       
}

?>