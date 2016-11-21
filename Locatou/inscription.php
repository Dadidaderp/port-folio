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
    
    <br>
    <br>
    

<?php

if(!isset($_SESSION['login'])&&isset($_POST['login'])) {

$link = mysqli_connect("localhost", "root", "root", "locatou");

if($_POST['login']=="admin"||$_POST['login']=="Admin2"){
    $admin=1;
} else {
    $admin=0;
}

if (mysqli_query($link, "INSERT INTO user(CodeClient,NomClient,PrenomClient,CodePostalClient,AdresseClient,TelephoneClient,MailClient,MoyenPaimentClient,DelaiPaimentClient,login,password,admin ) 	VALUES('','" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['codePostal'] . "','" . $_POST['adresse'] . "','" . $_POST['telephone'] . "','" . $_POST['email'] . "','','','".$_POST['login']."','".$_POST['password']."','".$admin."')")) {
    echo '<div class="valider">';
    echo '<br>Votre inscription à bien été prise en compte';
    echo '</div>';
} else {

    echo '<div class= "error"><br>Inscription impossible, un compte possèdant cette adresse mail ou numéro de téléphone est déjà existant</div>';
}

echo '<br>';
echo '<br>';

mysqli_close($link);

} else {
    
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
    
    }

?>
    

        
</body>


</html>