<?php


namespace General\Models;


/**
 * Class ClassFactory
 * @package App\Models
 */
abstract class ClassFactory
{
    /**
     * @return Blog
     */
    public static function getBlogModels()
    {
        return new Blog();
    }

    /**
     * @param $donnees
     * @return Article
     */
    public static function getArticleModels($donnees)
    {
        return new Article($donnees);
    }

    /**
     * @return ArticleManager
     */
    public static function getArticleManager()
    {
        return new ArticleManager();
    }

    /**
     * @return Programme
     */
    public static function getProgrammeModel()
    {
        return new Programme();
    }

    /**
     * @return UserManager
     */
    public static function getUserManager()
    {
        return new UserManager();
    }

}