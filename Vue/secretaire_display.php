<?php

   require('../Controller/Util.php');
   
   
   session_start();

    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else
   {
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $rdvs = [];
        $Secretaire = new Secretaire();
        $Secretaire = $Utilisateur->getSecretaire();
        $salle = new Salle();
        $rdvs=[];
        if(isset($_POST["chercher_rdv"])){
            
            array_push($rdvs, $Util->getRdvByDate($_POST["chercher_rdv"]));
            
        }else{
            $rdvs = $Util->findAllRdv();
        }
   }

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
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
                                        echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
                                   ?>
                                </h4>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Liste des rendez-vous à venir 
                            </div>
                            <div class="infos">
                                <form action="../Vue/secretaire_display.php" method="post">
                                    <br/>
                                    <label>Date RDV :</label>
                                    <input type="date" class="form-control" name="chercher_rdv">
                                    </br>
                                    <input type= "reset" name="effacer" id="reset" value = "Reset" onclick="rtn()" />
                                    <input type="submit" name="valider" id="checrcher" value ="Chercher" />
                                </form> 
                            </div>
                            <div class="en_bref">
                                
                            <div>
                                    <table class="table table-striped" >
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Salle</th>
                                            <th scope="col">Patient</th>
                                            <th scope="col">Medecin</th>
                                        </tr>
                                        <?php

                                            if($rdvs[0]!=null){
                                                foreach( $rdvs as $rdv){
                                                    $salle = $Util->getSalleById($rdv['Id_Salle'])["nom"];
                                                    echo ("<tr>");
                                                        echo ("<td>".$rdv['Date_Rendez_Vous']."</td>");
                                                        echo ("<td>".$salle."</td>");
                                                        $patient=$Util->getPatientByID($rdv["Id_Patient"]);
                                                        echo ("<td><a href='../Vue/fiche_patient.php/?id=".$patient['Id_Patient']."' >".$patient['Nom_Patient']." ".$patient['Prenom_Patient']."</a></td>");
                                                        $medecin=$Util->getMedecinByID($rdv["Id_Medecin"]);
                                                        echo ("<td><a href='../Vue/fiche_medecin.php/?id=".$medecin->getId_Medecin()."' >".$medecin->getNom_Medecin()." ".$medecin->getPrenom_Medecin()."</a></td>");

                                                    echo ("</tr>");
                                                    
                                                }
                                            }else{
                                                echo ("
                                                <tr>
                                                    <td colspan='4'>Aucun RDV trouvé </td>
                                                </tr>"
                                                );
                                            }
                                        
                                                
                                        
                                        ?>
                                    </table>
                                </div>                                
                                
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                                <a href="../Controller/secretaire_liste_patients.php"><i class="icon-user"></i> Liste des patients</a>
                                <br/>
                                <a href="../Vue/secretaire_liste_medecins.php"><i class="icon-user"></i> Liste des medecins</a>
                                <br/>
                                <a href="../Vue/secretaire_display.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
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
        <script>
            function rtn() {
                window.history.back();
            }
        </script>
    </body>
    
    
    
</html>
