   <?php
    require('../Controller/Util.php');
    $Util = new Util();
    
    if(isset($_POST["date"]) &&
        isset($_POST["salle"])&&
        isset($_POST["patient"])&&
        isset($_POST["medecin"])
        )
    {
        
        $Query = "INSERT INTO rendez_vous (Date_Rendez_Vous, Id_Patient, Id_Medecin, Id_Salle ) VALUES"
                                   ."('".$_POST["date"]."',"
                                   ."'".$_POST["patient"]."',"
                                   ."'".$_POST["medecin"]."',"
                                   ."'".$_POST["salle"]. "')";
        
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
    }