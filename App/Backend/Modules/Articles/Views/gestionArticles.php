<link rel="stylesheet" href="../../css/blog/modifArticle.css">

</head>

<body>

<header>
    <a href="./Articles-decoAdmin">Deconnexion</a>
</header>
<section class="all_articles">
    <div class="bouton_creation_article">
        <a href="http://localhost/code/blog/Public/index.php/admin/Articles-creationArticle">Creation d'un article</a>
    </div>

    <?php
    foreach ($result as $article) {
        ?>

        <div class="contener_article_modif">
            <div class="name_article">
                <?= $article['article_title'];?>
            </div>
            <div class="left_contener introduction_article_modif">
                <?= $article['article_introduction']; ?>
            </div>
            <div class="right_contener">
                <div class="contener_button_modif_article contener_button">
                    <a href="./Articles-modificationArticleSelected<?= $article['article_id']; ?>">Modifier</a>
                </div>
                <div class="contener_button_delete_article contener_button">
                    <a href="./Articles-deleteArticle<?= $article['article_id']; ?>">Delete</a>
                </div>

            </div>
        </div>

        <?php
    }
    echo $_SESSION['id_user'];
    ?>
</section>

