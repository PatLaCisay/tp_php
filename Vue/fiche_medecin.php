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
            $medecin = $Util->getMedecinById($_GET['id']);
            $patients = $Util->findMyPatients($_GET['id']);
            $consultations = $Util->findAllConsultation();
            
       }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $medecin->getNom_Medecin().' '.$medecin->getPrenom_Medecin(); ?>
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
                                        echo $medecin->getNom_Medecin().' '.$medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
                            
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Fiche medecin:  <?php echo $medecin->getNom_Medecin()." ".$medecin->getPrenom_Medecin(); ?>
                            </div>
                            <div class="Left-body">
                                
                                <table class="table table-striped" >
                                    <tr>
                                        <th scope="row">Nom</th>
                                        <td ><?php echo $medecin->getNom_Medecin(); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Prenom</th>
                                        <td ><?php echo $medecin->getPrenom_Medecin(); ?></td>
                                    </tr>
                                </table>
                                
                            </div>
                            <div class="Left-body">
                                <h4> Consultations </h4>
                                <table class="table table-striped" >
                                    <?php foreach($consultations as $consultation){
                                        echo '<tr>';
                                            echo '<th scope="row">'.$consultation["Date_Consultation"].'</th>';
                                            echo '<td>'.$consultation["Compte_Rendu_Consultation"].'</td>';
                                            $patient=$Util->getPatientById($consultation["Id_Patient"]);
                                            echo '<td>'."<a href='../fiche_patient.php/?id=".$patient['Id_Patient']."' >".$patient['Nom_Patient']." ".$patient['Prenom_Patient']."</a>".'</td>';
                                        echo '</tr>';
                                    } ?>
                                </table>
                                
                            </div>
                        </div>
                        <div class="Right-body">
                            <div class="About-us">
                                <div class="Social-NW-head">
                                    
                                </div>
                                <div class="Social-NW-body">
                                    <a href="../Controller/secretaire_liste_medecins.php"><i class="icon-user"></i> Liste des medecins</a>
                                        <br/>
                                    <a href="../secretaire_liste_medecins.php"><i class="icon-user"></i> Liste des medecins</a>
                                    <br/>
                                    <a href="../secretaire_display.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                    <hr/>
                                    <a href="../tp_php/Controller/ajout_rdv.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                    <br/>
                                    <a href="../ajout_medecin.php"><i class="icon-plus"></i> Nouvelle fiche medecin</a>
                                    <hr/>
                                    <a href="../tp_phpController/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>
                                    
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
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
