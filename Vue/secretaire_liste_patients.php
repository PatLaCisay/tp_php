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
            $Secretaire = new Secretaire();
            $Secretaire = $Utilisateur->getSecretaire();
            $patients = $Util->findAllPatients();
       }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Liste patients
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
                                Liste patients
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                                <div>
                                    <table class="table table-striped" >
                                        <tr>
                                            <th scope="col">Patient</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Mutuelle</th>
                                        </tr>
                                        <?php
                                            if($patients)
                                            {
                                                foreach( $patients as $patient){
                                                    echo ("<tr>");
                                                        echo ("<td><a href='../Vue/fiche_patient.php/?id=".$patient['Id_Patient']."' >".$patient['Nom_Patient']." ".$patient['Prenom_Patient']."</a></td>");
                                                        echo ("<td>".$patient['Adresse_Patient']."</td>");
                                                        echo ("<td>".$patient['Affiliation_Mutuelle']."</td>");
                                                    echo ("</tr>");
                                                    
                                                }
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
                                <a href="../Vue/ajout_medecin.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
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

    </body>
</html>



