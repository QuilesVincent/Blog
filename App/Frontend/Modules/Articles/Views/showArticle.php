<link href="../css/blog.css" rel="stylesheet">
<link href="../css/headerGeneral.css" rel="stylesheet">
<link href="../css/footerGeneral.css" rel="stylesheet">
<link href="../css/blog/article.css" rel="stylesheet">

</head>
<body>

<div class="header_lien_programme">
    <strong>Découvrez le programme et révolutionner votre vie, tout ça gratuitement ! </strong>
    <a href="http://localhost/code/blog/public/index.php/programme-index">En savoir plus</a>
</div>
<?php include('headerGeneral.html.php'); ?>
<div class="principalPage">
    <div class="contentFree"></div>
    <section class="contentArticle">
        <h1><?= $result['article_title'];?></h1>
        <?= $result['article_content'];?>
    </section>
    <div class="contentPub"></div>
</div>

<div class="contentAboNews">
    <div class="leftContent sousContentAboNews">
        <div>
            <h3>Pour Révolutionner votre vie maitenenant !</h3>
            <p>Ce programme est fais pour vous. Rapide et efficace, enfin un service qui ne
                vous fait pas perdre votre temps et vous rapporte beaucoup.</p>
            <a href="./programme-index">Rejoindre l'aventure</a>
        </div>
    </div>

    <div class="rightContent sousContentAboNews">
        <div>
            <h3>Abonnez-vous à la newsletter</h3>
            <p>Recevez régulièrement des informations exclusives directement dans votre
                boite email. On ne partagera votre adresse avec personne, promis</p>
            <form action="" class="formNewsletter" method="POST">
                <input name="emailNewsletter" placeholder="votre e-mail" type="text">
                <input name="submitNewsletter" type="submit" value="Je m'abonne" class="submit">
            </form>
        </div>
    </div>
</div>

<footer>
    <div class="contener_div_info_footer">
        <div class="div_info_footer">
            <div>
                <h3>Reussi tout maintenant</h3>
                <p>Reussi tout maintenant est le premier blog qui te fais vraiment réussir, et avancer. Finis les échecs
                    et les déceptions, place à au succès.</p>
            </div>
            <div>
                <h3>Le Programme</h3>
                <a href="none">Le contenu</a>
                <a href="none">Comment s'inscrire ?</a>
                <a href="none">Le prix</a>
                <a href="none">Commencer directement</a>
            </div>
            <div>
                <h3>Communauté</h3>
                <a href="none">La chaîne Youtube</a>
                <a href="none">Le groupe Facebook</a>
                <a href="none">Linkedin</a>
                <a href="none">Les avis clients</a>
                <a href="none">Devenir ambassadeur</a>

            </div>
            <div>
                <h3>Mentions légales</h3>
                <a href="none">Conditions générales</a>
                <a href="none">Politique de confidentialité</a>
                <a href="none">Mentions légales</a>
            </div>
        </div>
    </div>
    <div class="div_droit_footer">
        <div class="droit">
            <p>Tous droits réservés 2020 – 2024 © Réussi maintenant</p>
        </div>
        <div class="contener_social_reseau">
            <div>
                <p>Suivez-nous sur les réseaux sociaux</p>
            </div>
            <div><img src="" alt="logo fb"></div>
            <div><img src="" alt="logo insta"></div>
            <div><img src="" alt="logo twitter"></div>
            <div><img src="" alt="logo snap"></div>
            <div><img src="" alt="logo linkedin"></div>
        </div>
    </div>

</footer>

<?php