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
            $medecins=[];
            if(isset($_POST["chercher_medecin"])){
                array_push($medecins, $Util->getMedecinByName($_POST["chercher_medecin"]));
                
            }else{
                $medecins = $Util->findAllMedecins();
            }
       }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Liste medecins
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
                                Liste medecins
                            </div>

                            <div class="infos">
                                <form action="../Vue/secretaire_liste_medecins.php" method="post">
                                    <br/>
                                    <label>Medecin :</label>
                                    <select class="form-control" name="chercher_medecin">
                                        <option value="" disabled selected>Selectionner un medecin</option>
                                        <?php foreach($medecins as $medecin){ 
                                                echo '<option value="'.$medecin["Nom_Medecin"].'">';
                                                echo $medecin["Nom_Medecin"]." ".$medecin["Prenom_Medecin"];
                                                echo'</option>';
                                            }
                                        ?>
                                    </select>
                                    </br>
                                    <input type= "reset" name="effacer" id="reset" value = "Reset" onclick="rtn()" />
                                    <input type="submit" name="valider" id="checrcher" value ="Chercher" />
                                </form>                                 
                            </div>
                                <div>
                                    <table class="table table-striped" >
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prenom</th>
                                            <th scope="col">Fiche</th>
                                        </tr>
                                        <?php

                                            foreach($medecins as $medecin){
                                                echo("<tr>");
                                                echo ("<td>".$medecin['Nom_Medecin']."</td>");
                                                echo ("<td>".$medecin['Prenom_Medecin']."</td>");
                                                echo ("<td><a href='../Vue/fiche_medecin.php/?id=".$medecin['Id_Medecin']."'>Fiche</a></td>");

                                                echo("</tr>");
                                            }
                                        
                                        ?>
                                    </table>
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



