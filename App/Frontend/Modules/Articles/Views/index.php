<link href="css/blog.css" rel="stylesheet">
<link href="css/headerGeneral.css" rel="stylesheet">
<link href="css/footerGeneral.css" rel="stylesheet">
</head>

<body>
<?php include('headerGeneral.html.php'); ?>

    <section class="presentation">
        <div class="text_presentation">
            <div class="partie_text_presentation">
                <div class="titre_text_presentation">
                    <h2>67% des Personnes Sondées </br> ne se considèrent pas heureuses. </br> Et si c'est votre cas ?</h2>
                    <!-- mettre un trait jaune-->
                </div>
                <div class="paraph_text_presentation">
                    <p>Faites le test tout de suite et découvrer votre niveau de bonheure actuel afin de découvrir des
                        recommendations pour
                        vivre une vie plus épanouissante dans un monde toujours plus négatif !</p>
                </div>
            </div>
            <div class="button_lien_commencer_presentation">
                <p><span>Cliquez ici pour commencer</span></p> <!-- mettre redirect en javascript-->
            </div>
        </div>
    </section>
    <section class="section_articles">
        <?php foreach ($result as $article) {
            ?>
            <div class="contener_article contener_article_<?= $article['article_id']; ?>">
                <div class="img_article">
                    <img src="image/reussiteMini.jpg" alt="image article <?= $article['article_title_picture']; ?>">
                </div>
                <div class="introduction_article">
                    <h3><?= $article['article_introduction']; ?></h3>
                </div>
                <div class="div_surdiv_button">
                    <div class="div_button">
                        <a href="index.php/articles-showArticle<?= $article['article_id']; ?>">Lire</a>
                    </div>
                    <div><!--Mettre un petit logo carré style livre ou autre--></div>

                </div>
            </div>
        <?php }?>
    </section>

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