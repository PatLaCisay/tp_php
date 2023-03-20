<?php
    require('../Controller/Util.php');
    $Util = new Util();

    if(isset($_POST["date"]) &&
        isset($_POST["medecin"])&&
        isset($_POST["patient"])&&
        isset($_POST["cr"])&&
        isset($_POST["id"])
        )
    {
        
        $Query = "  UPDATE `consultation`
                    SET `Date_Consultation` ="."'".$_POST["date"]."'".",`Compte_Rendu_Consultation` ="."'".$_POST["cr"]."'".",`Id_Patient` =" .$_POST["patient"]."
                    WHERE `Id_Consultation` = ".$_POST["id"];
                                 
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/medecin_consultation.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
    }else if(isset($_POST["date"]) &&
        isset($_POST["medecin"])&&
        isset($_POST["patient"])&&
        isset($_POST["cr"])&&
        !isset($_GET["id"])
        ) 
    {

        $Query = "INSERT INTO consultation (Date_Consultation, Compte_Rendu_Consultation, Id_Patient, Id_Medecin ) VALUES"
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
                header("location: ../Vue/medecin_consultation.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
    }else{
        header("location: ../Vue/ajout_consultation.php");
    }