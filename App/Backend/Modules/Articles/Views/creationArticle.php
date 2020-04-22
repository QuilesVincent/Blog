<?php

if(isset($_SESSION)) {
    echo $_SESSION['id_user'];
}

?>
</head>
<body>

<section class="creation_input">
        <form action="http://localhost/code/blog/Public/index.php/admin/Articles-articleCreated" method="POST">
        <input type="text" name="article_title" placeholder="Titre de l'article">
        <input type="text" name="article_title_picture" placeholder="Titre de la photo de l'article">
        <textarea name="article_content" placeholder="Ecrivez le contenu de l'article"></textarea>


        <label for="article_category">Quelle est la catégorie de l'article ?</label>
        <select name='article_category' class='secretQuestion inputForm' placeholder="catégorie de l'article">
            <option value='changement'>Changement</option>
            <option value='renaissance'>Renaissance</option>
        </select>

        <input type="submit" name="submit_creation_article">
    </form>


</section>
</body>
