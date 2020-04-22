<?php /*if(isset($_SESSION['connect']) || isset($_COOKIE['userName'])){
    //echo "error aie aie aie aie ";
    header('Location:index.php?controllers=programme&task=connexionIntroduction');
};*/


if(isset($error)) {
    echo $error;
}
?>


<link href='../css/programme/connexion.css' rel='stylesheet'>
<script src="../javascript/programme/connexion.js"></script>

</head>

<body>

<section class="page_connexion">
    <div class="logo">
        <div class="div_image">
            <img src="../image/logo/vincent.png" alt="logo">
        </div>
    </div>

    <form class="form_co hide" action="http://localhost/code/blog/Public/index.php/programme-userConnexionCheck" method="POST">
        <input class="email_connexion" name="email_connexion" placeholder="Entrez votre adresse e-mail ou username" type="text">
        <input class="password_connexion" name="password_connexion" placeholder="Entrez votre mot de passe" type="password">
        <div class="connexion">
            <input type="submit" name="submit_connexion" value="se connecter">
        </div>
        <div class="lien_miss_password">
            <a href="http://localhost/code/blog/public/index.php?controllers=user&task=missPassword">Mot de passe oublié ?</a>
        </div>

        <div class="lien_not_yet_compte">
            <a href="http://localhost/code/blog/public/index.php?controllers=user&task=notYetCompte">Vous n'avez pas encore de compte ?</a>
        </div>
    </form>


    <div class="affiche pre_co">
        <div class="connexion_cache">
            <p class="lien_co">Connexion</p>
        </div>

        <div class="more_info">
            <a href="http://localhost/code/blog/public/index.php/programme-moreInfo">Plus d'info sur le programme</a>
        </div>

        <div class="div_name_blog">
            <p>Succes to you</p>
        </div>
    </div>


</section>
</body>
</html>

