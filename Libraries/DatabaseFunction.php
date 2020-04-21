<?php


namespace General;


class DatabaseFunction
{

    public static function writteAlert($obj, $balise)
    {
        return "<$balise class='msgAdvertissement'>".$obj."</$balise>";
    }

    public static function tronquer($content,$maxCarac, $finisher = null)
    {
        $positionSpace = strpos($content, ' ',$maxCarac);
        $newContent = substr($content,0,$positionSpace);
        if($finisher != null){
            $newContent .= '...';
        }
        return $newContent;
    }

    /**
     * @param $content
     * @param $lettreASupprimer
     * @return mixed
     */
    public static function remplacement($content, $lettreASupprimer)
    {
        $content = str_split($content);
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i] === $lettreASupprimer) {
                $content[$i + 1] = ucfirst($content[$i + 1]);
                $content[$i] = "";
            }
        }

        return implode($content);
    }

}