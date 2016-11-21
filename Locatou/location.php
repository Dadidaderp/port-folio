<?php
    session_start();
?>
<html>
    <head>
        <title>Locatou</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href= "style.css"/>

    <header>
        <p class="titre">
            <a href="index.php"> <img src="images/titre.png" alt="Titre" /> </a>
        </p>
        <div id="login">
            
                
                <br>
                
                <?php
                
                if(!isset($_SESSION['login'])) {
                    ?>
                
                    <input type="button" name="inscription" value="Inscription" onclick="self.location.href ='inscription.html'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick> 
                    <input type="button" name="login" value="Se connecter" onclick="self.location.href='login.php'">
                    
                <?php
                
                } else {
                    echo 'Bonjour ' . $_SESSION['login'];
                    echo '<br>';
                ?>
                    <input class="inscrit" type="button" value="Deconnection" onclick="self.location.href='deconnection.php'">
                
                <?php 
                    
                    if($_SESSION['admin']==1)
                    {
                        ?>
                        <br><input class="inscrit" type="button" value="Administration" onclick="self.location.href='admin.php'">
                <?php
                }
                }
                
                ?>
        </div>

        <ul id="menu-principal">
            <li><a href="menu_modeles.php">Location</a>
                <ul>
                    <li><a href="audi.php">Audi</a></li>
                    <li><a href="bmw.php">BMW</a></li>
                    <li><a href="mini.php">Mini</a></li>
                    <li><a href="nissan.php">Nissan</a></li>
                </ul>
            </li>
            <li><a href="#">A propos</a>
                <ul>
                    <li><a href="contact.php">Nous contacter</a></li>
                    <li><a href="plan_du_site.php">Nos agences</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </li>
            <li><a href="#">Mon compte</a>
                <ul>
                    <li><a href="commandes.php">Mes commandes</a></li>
                    <li><a href="moncompte.php">Mon compte</a></li>
                </ul>
            </li>

        </ul>
    </header>

</head>

<body>

    <br><br>


    <div id="location">

        <fieldset>
            <legend>Récaptiulatif de votre commande</legend>
            <br>
            
            <?php
            
            $link = mysqli_connect("localhost", "root", "root", "locatou");
            
            $db = mysql_connect('localhost', 'root', 'root'); 
            mysql_select_db('locatou',$db); 
            
            
            
            
            if($_POST['kilometrage'] == 200){
                $_POST['prixBase'] = $_POST[prixBase]*2;
            } else if($_POST['kilometrage'] == 300){
                $_POST['prixBase'] = $_POST[prixBase]*3;
            }
            
            
            
            
            if (mysqli_query($link, "INSERT INTO Contrat(NumeroContrat,PremierJourContrat,DateContrat,DureeLocation,NomConducteur,PrenomConducteur,Kilometrage,PrixTotal,MarqueContrat,ModeleContrat,ClientContrat,MoyenPaiment) VALUES('','" . $_POST['permierJour'] . "','" . date('Y-m-d') . "','" . $_POST['dureeLocation'] . "','".$_POST['nom']."','".$_POST['prenom']."','" . $_POST['kilometrage']*$_POST['dureeLocation'] . "','" .$_POST['prixBase']*$_POST['dureeLocation']."','".$_POST['marque']."','".$_POST['modele']."','".$_SESSION['login']."','".$_POST['moyenPaiment']."')")) {

                    if (isset($_POST['dureeLocation']) && isset($_POST['permierJour']) && isset($_POST['moyenPaiment'])) {
                        
                        $sql = "SELECT NumeroContrat FROM Contrat WHERE PremierJourContrat='".$_POST['permierJour']."' && NomConducteur='".$_POST['nom']."' && PrenomConducteur='".$_POST['prenom']."' && DureeLocation='".$_POST['dureeLocation']."' && Kilometrage='".$_POST['kilometrage']*$_POST['dureeLocation']."'  && PrixTotal ='".$_POST['prixBase']*$_POST['dureeLocation']."' && MarqueContrat ='".$_POST['marque']."' && ModeleContrat='".$_POST['modele']."'";
            
                        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
                        $data = mysql_fetch_assoc($req);
                        
                        echo 'Votre numéro de commande :<f><strong>' . $data['NumeroContrat']. '</strong></f>';
                        echo '<br><br>';
                        echo 'Marque du véhicule loué : ' .$_POST['marque'];
                        echo '<br>';
                        echo 'Modèle du véhicule loué : ' .$_POST['modele'];
                        echo '<br>';
                        echo "<br>";
                        echo "Nom du conducteur : " .$_POST['nom'];
                        echo "<br>";
                        echo "Prenom du conducteur : " .$_POST['prenom'];
                        echo "<br><br>";                        
                        echo "Durée de la location : " . $_POST['dureeLocation'] . " jours";
                        echo "<br>";
                        echo "Premier jour de la location : " . $_POST['permierJour'];
                        echo "<br>";
                        echo "Votre moyen de paiment : " . $_POST['moyenPaiment']."*";
                        echo "<br>";
                        echo "Kilometrage total : " . $_POST['dureeLocation'] * $_POST['kilometrage'] . " Km";
                        echo "<br>";
                        echo "Prix de la location : " .$_POST['prixBase']*$_POST['dureeLocation'] . " €" ;
                        echo "<br><br>";
                        echo "*Le paiment se fera à la réstitution du véhicule";
                }
            }
            
            ?>

        </fieldset>

    </div>
    
    
    
    
        
        
        <br>
        <br>
        
    <?php
        
        
        echo "<div class='recap'><strong>Déroulement de la livraison du véhicule</strong><br><br>Rendez-vous le " .$_POST['permierJour'] . " à notre agence 69 Rue de Mets Toulouse (entre 8h et 20h 7jours sur 7).
        <br><br>
        Présentez vous muni de votre permis de conduire, un montant de 500€ ou votre carte bancaire (caution) ainsi que votre numéro de commande
        <br>
        Les clefs du véhicule de marque " .$_POST['marque'] . " modèle " . $_POST['modele']. " vous seront remises</div>";
        
        
    ?>
    
   

</body>

</html>
