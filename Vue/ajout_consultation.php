<?php

   require('../Controller/Util.php');
   
   
   session_start();

    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $Medecin = new Medecin();
        $Medecin = $Utilisateur->getMedecin();
        $patients= $Util->findMyPatients($Medecin->getId_Medecin());
   }

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
               ?>
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="content" class="span9">
                    <div class="main_body">
                    
                        <div class="Home-Header">
                            <div class="Slogan">
                                
                            </div>
                            <div class="Contact-Research">

                            </div>
                            <div class="Logo">

                            </div>
                        </div>
                        <div class="Horizontal-menu">
                            <center>
                                <h4>
                                    <?php
                                        echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Ajouter un nouveau patient 
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                            <form action="../Controller/ajout_consultation.php" method="post">
                                    <br/>
                                    <label>Date :</label>
                                        <input class="textfield_form" type="date" name="date"/><br/>
                                    <label>Patient :</label>
                                        <select class="form-control" name="patient">
                                        <?php foreach($patients as $patient){ 
                                                echo '<option value="'.$patient["Id_Patient"].'">';
                                                echo $patient["Nom_Patient"]." ".$patient["Prenom_Patient"];
                                                echo'</option>';
                                            }
                                            ?>
                                        </select>
                                    <label>Compte-rendu :</label>
                                    <textarea class="form-control" name="cr" rows="4" cols="50" ></textarea>
                                    <label>Medecin :</label>
                                    <input type="number" readonly class="d-none" name="medecin" value=<?php echo $Medecin->getId_Medecin(); ?>>
                                    <label></label>
                                    <input type="reset" name="effacer" value = "Effacer"/>
                                    <input type="submit" name="valider" value = "Ajouter"/>
                                </form>
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                                
                                <a href="../Controller/Medecin_liste_patients.php"><i class="icon-user"></i> Liste des patients</a>
                                <br/>
                                <a href="../Vue/Medecin_display.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr/>
                                <a href="../Controller/ajout_rdv.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br/>
                                <a href="../Vue/ajout_patient.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>
                                
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    </div>
                    <div class="footer">
                        &COPY; Cabinet Médical 2021
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
    
    
    
</html>
