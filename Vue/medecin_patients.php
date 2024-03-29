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
        $Medecin = new Secretaire();
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
                     
                                <h4>
                                    <?php
                                        echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
    
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Mes patients 
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                                <ul class="list-group">
                                        <?php
                                            if($patients)
                                            {
                                                foreach( $patients as $patient){
                                                    echo ("<li class='list-group-item'>");
                                                        echo ("<p>".$patient['Nom_Patient']." ".$patient['Prenom_Patient']."</p>");
                                                    echo ("</li>");
                                                    
                                                }
                                            }
                                        ?>
                                    </ul> 
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                            <br/>
                                <a href="../Vue/medecin_display.php"><i class="icon-calendar"></i> Mes rendez-vous</a>
                                <hr/>
                                <a href="../Vue/medecin_consultation.php"><i class="icon-list"></i> Mes consultations</a>
                                <br/>
                                <a href="../Vue/ajout_consultation.php"><i class="icon-plus"></i> Nouvelle consultation</a>
                                </hr>
                                </br>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>
                                <br/>
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
