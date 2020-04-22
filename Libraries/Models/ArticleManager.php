<?php

namespace General\Models;

Use \PDO;


class ArticleManager extends MainModel
{
    protected $table = 'articles';
    protected $obName = Article::class;

    public function __construct()
    {
        parent::__construct();
    }

    public function getArticle()
    {
        $req = $this->pdo->query('SELECT * FROM articles');
        $donnees = $req->fetchall();
        return $donnees;
    }

    public function findReturnArticle($target_id, $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $target_id = :id");

        // On exécute la requête en précisant le paramètre :article_id
        $req->execute([':id' => $id]);

        // On fouille le résultat pour en extraire les données réelles en retournant une class obj
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $article = new Article($donnees);
        $pop = ["article" => $article];
        return $pop;
    }

    public function ModifArticle(int $article_user_id, string $article_title, string $article_title_picture, string $article_content, string $article_category, string $article_introduction, int $article_nombre_comment, string $article_creation_date, int $article_id)
    {
        $req = $this->pdo->prepare("UPDATE articles SET article_user_id = :article_user_id, article_title = :article_title, article_title_picture = :article_title_picture, article_content = :article_content, article_category = :article_category, article_introduction = :article_introduction, article_nombre_comment = :article_nombre_comment, article_creation_date = :article_creation_date WHERE article_id = :article_id");
        $req->bindValue(':article_user_id', $article_user_id, PDO::PARAM_INT);
        $req->bindValue(':article_title', $article_title, PDO::PARAM_STR);
        $req->bindValue(':article_title_picture', $article_title_picture, PDO::PARAM_STR);
        $req->bindValue(':article_content', $article_content, PDO::PARAM_STR);
        $req->bindValue(':article_category', $article_category, PDO::PARAM_STR);
        $req->bindValue(':article_introduction', $article_introduction, PDO::PARAM_STR);
        $req->bindValue(':article_nombre_comment', $article_nombre_comment, PDO::PARAM_STR);
        $req->bindValue(':article_creation_date', $article_creation_date, PDO::PARAM_STR);
        $req->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $req->execute();
    }


    /*Trouver le moyen que cela fonctionne, ceci nous permettrai de ne faire qu'une fonction pour l'ajout directement en ajoutant un article Class
     * En rapport avec la fonction sql de la class Article

    public function testInsertArticle(Article $article)
    {
        $result = $article->sql();
        $req = $this->pdo->prepare($result['sql']);
        $reqo = "";
        var_dump($result['exec'][':article_creation_date']);
        foreach($result['exec'] as $exec => $value){
            $reqo .= "$exec => $value,";

        }
        var_dump($reqo);
        $req->execute([$reqo]);
    }*/

    public function postArticle(int $article_user_id, string $article_title, string $article_title_picture, string $article_content, string $article_category, string $article_introduction, int $article_nombre_comment, string $article_creation_date): void
    {
        $req = $this->pdo->prepare('INSERT INTO articles (article_user_id, article_title, article_title_picture, article_content, article_category, article_introduction, article_nombre_comment, article_creation_date) VALUES (:article_user_id, :article_title, :article_title_picture, :article_content, :article_category, :article_introduction, :article_nombre_comment, :article_creation_date)');
        $req->bindValue(':article_user_id', $article_user_id, PDO::PARAM_INT);
        $req->bindValue(':article_title', $article_title, PDO::PARAM_STR);
        $req->bindValue(':article_title_picture', $article_title_picture, PDO::PARAM_STR);
        $req->bindValue(':article_content', $article_content, PDO::PARAM_STR);
        $req->bindValue(':article_category', $article_category, PDO::PARAM_STR);
        $req->bindValue(':article_introduction', $article_introduction, PDO::PARAM_STR);
        $req->bindValue(':article_nombre_comment', $article_nombre_comment, PDO::PARAM_INT);
        $req->bindValue(':article_creation_date', $article_creation_date, PDO::PARAM_STR);
        $req->execute();
    }

    /*

    public function postArticleWithArticle(Article $article): void
    {
        $req = $this->pdo->prepare('INSERT INTO articles (article_user_id, article_title, article_title_picture, article_content, article_category, article_introduction, article_nombre_comment, article_creation_date) VALUES (:article_user_id, :article_title, :article_title_picture, :article_content, :article_category, :article_introduction, :article_nombre_comment, :article_creation_date)');
        $req->bindValue(':article_user_id', $article->getArticleUserId(), PDO::PARAM_INT);
        $req->bindValue(':article_title', $article->getArticleTitle(), PDO::PARAM_STR);
        $req->bindValue(':article_title_picture', $article->getArticleTitlePicture(), PDO::PARAM_STR);
        $req->bindValue(':article_content', $article->getArticleContent(), PDO::PARAM_STR);
        $req->bindValue(':article_category', $article->getArticleCategory(), PDO::PARAM_STR);
        $req->bindValue(':article_introduction', $article->getArticleIntroduction(), PDO::PARAM_STR);
        $req->bindValue(':article_nombre_comment', $article->getArticleNombreComment(), PDO::PARAM_INT);
        $req->bindValue(':article_creation_date', $article->getArticleCreationDate(), PDO::PARAM_STR);
        $req->execute();
    }*/

    public function getArticleAndHisComment(int $article_id)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} LEFT JOIN comments ON {$this->table}.article_id = comments.comment_article_id WHERE {$this->table}.article_id = $article_id");
        $req->execute(["id" => $article_id]);
        $article = $req->fetchAll(PDO::FETCH_CLASS, \App\Models\Article::class);
        $i = 0;
        foreach ($article as $art) {
            if ($art !== $article[0]) {
                $i = $i + 1;
                $article[0]->arrayComments["comment_content$i"] = $art->comment_content;
                $article[0]->array["comment_date$i"] = $art->comment_date;
            }
        }
        return $article[0];
    }


}