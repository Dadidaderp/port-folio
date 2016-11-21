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
    <img class="sous_titre" src="images/sous_titre.png" alt="SousTitre">
</head>

<body>
    
    <div class="commandes">
    
    <h1>Récapitulatif de vos commandes</h1>
    
    <?php 
    
        if(isset($_SESSION['login'])) {
    
        try
        {
	$bdd = new PDO('mysql:host=localhost;dbname=locatou;charset=utf8', 'root', 'root');
        }
        
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }




$reponse = $bdd->query("SELECT * FROM Contrat WHERE ClientContrat='".$_SESSION['login']."'");


while ($donnees = $reponse->fetch())
{
    echo "<div class=''>";
    echo "<fieldset>";
    echo "<legend>Commande numéro <f><strong>" .$donnees['NumeroContrat']."</strong></f></legend>";
    echo "<br>";
    echo "Marque du véhicule loué : " .$donnees['MarqueContrat'];
    echo "<br>";
    echo "Modele du véhicule loué : " .$donnees['ModeleContrat'];
    echo '<br>';
    echo "<br>";
    echo "Nom du conducteur : " .$donnees['NomConducteur'];
    echo "<br>";
    echo "Prenom du conducteur : " .$donnees['PrenomConducteur'];
    echo "<br><br>";                        
    echo "Durée de la location : " . $donnees['DureeLocation'] . " jours";
    echo "<br>";
    echo "Premier jour de la location : " . $donnees['PremierJourContrat'];
    echo "<br>";
    echo "Kilometrage total : " .$donnees['Kilometrage'] . " Km";
    echo "<br>";
    echo "Prix de la location : " .$donnees['PrixTotal']. " €" ;
    echo "<br>";
    if($donnees['MoyenPaiment']=="ChÃ¨que"){
        $donnees['MoyenPaiment']="Chèque";
    }
    echo "Moyen de paiement : " .$donnees['MoyenPaiment'];
    echo "<br><br>";
    echo "Validation de la commande :";
    if($donnees['validation']==1){
        echo "<strong><v>Validée</v></strong>";
    } else {
        echo "<br>";
        echo "<strong>En attente<strong>";
    }
    echo "<br><br>";
    
    echo "</div>";
    
    
}      

        } else {
            
             echo 'Vous n\'êtes pas connecté, accés interdit !</h1> <meta http-equiv="refresh" content="0; URL=redirection.php">';
          
        }
        
 ?>       
        
    <br>    
    
    
    </div>    
    
</body>

</html>