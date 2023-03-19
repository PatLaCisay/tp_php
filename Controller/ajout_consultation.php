<?php
    require('../Controller/Util.php');
    $Util = new Util();
    
    if(isset($_POST["date"]) &&
        isset($_POST["medecin"])&&
        isset($_POST["patient"])&&
        isset($_POST["cr"])
        )
    {
        
        $Query = "INSERT INTO rendez_vous (Date_Rendez_Vous,Compte_Rendu_Consultation, Id_Patient, Id_Medecin ) VALUES"
                                   ."('".$_POST["date"]."',"
                                   ."'".$_POST["cr"]."',"
                                   ."'".$_POST["patient"]."',"
                                   ."'".$_POST["medecin"]. "')";
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/secretaire_display.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
    }else{
        header("location: ../Vue/ajout_rdv.php");
    }