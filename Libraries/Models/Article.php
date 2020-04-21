<?php

namespace General\Models;

use General\DatabaseFunction;

/**
 * Class Article
 * @package App\Models
 */
class Article
{
    /**
     * @var
     */
    protected $article_id;
    /**
     * @var
     */
    protected $article_user_id;
    /**
     * @var
     */
    protected $article_title;
    /**
     * @var
     */
    protected $article_title_picture;
    /**
     * @var
     */
    protected $article_content;
    /**
     * @var
     */
    protected $article_category;
    /**
     * @var
     */
    protected $article_introduction;
    /**
     * @var
     */
    protected $article_nombre_comment;
    /**
     * @var
     */
    protected $article_creation_date;


    /**
     * Article constructor.
     * @param array $donnees
     */
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        if(empty($this->article_creation_date)) $this->setArticleCreationDate();
        if(empty($this->article_nombre_comment)) $this->setArticleNombreComment(0);
        $this->setArticleIntroduction();
    }

    /*Trouver le moyen que cela fonctionne, ceci nous permettrai de ne faire qu'une fonction pour l'ajout directement en ajoutant un article Classe
     * En rapport avec la fonction d'ajout d'article manager
     *
     *
    */
    public function sql()
    {
        $sql = "INSERT INTO articles (";
        $secondSql = ") VALUES (";
        $tableauSql = [];
        $tableauNewValeur = [];
        $tableauAsValues = [];
        $tableauExec = [];
        $tableauGeneral = [];

        foreach($this as $key => $value)
        {
            $tableauSql[] = $key;
            $tableauAsValues[] = ":$key";
            $tableauNewValeur[] = $key;
            if($key !== "article_id")  {
                $tableauExec[":$key"] = $value;
            }
        }
        $valueSQL = implode(", ", $tableauSql);
        $valueAsValues = implode(", ", $tableauAsValues);
        $sql .= "$valueSQL) VALUES ($valueAsValues);";
        $tableauGeneral['sql'] = $sql;
        $tableauGeneral['exec'] = $tableauExec;
        return $tableauGeneral;
    }


    /**
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $key = DatabaseFunction::remplacement($key, "_");
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @return mixed
     */
    public function getArticleUserId()
    {
        return $this->article_user_id;
    }

    /**
     * @return mixed
     */
    public function getArticleTitle()
    {
        return $this->article_title;
    }

    /**
     * @return mixed
     */
    public function getArticleTitlePicture()
    {
        return $this->article_title_picture;
    }

    /**
     * @return mixed
     */
    public function getArticleContent()
    {
        return $this->article_content;
    }

    /**
     * @return mixed
     */
    public function getArticleCategory()
    {
        return $this->article_category;
    }

    /**
     * @return mixed
     */
    public function getArticleIntroduction()
    {
        return $this->article_introduction;
    }

    /**
     * @return mixed
     */
    public function getArticleNombreComment()
    {
        return $this->article_nombre_comment;
    }

    /**
     * @return mixed
     */
    public function getArticleCreationDate()
    {
        return $this->article_creation_date;
    }


    /**
     * @param mixed $article_id
     */
    public function setArticleId($article_id): void
    {
        $this->article_id = (int)$article_id;
    }

    /**
     * @param mixed $article_user_id
     */
    public function setArticleUserId($article_user_id): void
    {
        $this->article_user_id = (int)$article_user_id;
    }

    /**
     * @param mixed $article_title
     */
    public function setArticleTitle($article_title): void
    {
        $this->article_title = $article_title;
    }

    /**
     * @param mixed $article_title_picture
     */
    public function setArticleTitlePicture($article_title_picture): void
    {
        $this->article_title_picture = $article_title_picture;
    }

    /**
     * @param mixed $article_content
     */
    public function setArticleContent($article_content): void
    {
        $this->article_content = $article_content;
    }

    /**
     * @param mixed $article_category
     */
    public function setArticleCategory($article_category): void
    {
        $this->article_category = $article_category;
    }

    /**
     * @param string|null $article_introduction
     */
    public function setArticleIntroduction(? string $article_introduction = null): void
    {
        if(isset($this->article_introduction)){
            exit();
        }
        if(empty($article_introduction)) {
            $this->article_introduction = DatabaseFunction::tronquer($this->article_content, 30);
        } else {
            $this->article_introduction = $article_introduction;
        }
    }

    /**
     * @param $article_nombre_comment
     */
    public function setArticleNombreComment($article_nombre_comment = null): void
    {

        if($article_nombre_comment === null){
            $this->article_nombre_comment = 0;
        } else {
            $this->article_nombre_comment = $article_nombre_comment;
        }
    }


    /**
     * @set date with DateTime
     */

    public function setArticleCreationDate($date = null): void
    {
        $date = new \DateTime();
        $this->article_creation_date = $date->format('Y-m-d H:i');
    }

    /**
     * @param $nom
     * @param $valeur
     * @return string
     */
    public function __set($nom, $valeur)
    {
        return "Impossible d'assigner à l'attribut $nom la valeur $valeur car l'attribut n'existe pas";
    }

    /**
     * @param $nom
     * @return string
     */
    public function __get($nom)
    {
        return "Impossible d'accèder à l'attribut $nom car l'attribut n'existe pas";
    }


}