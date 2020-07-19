<?php


class Text
{
    static public function truncate($content = false, $limit = false, $stripTags = false, $ellipsis = false) 
    {
        if (strlen($content)>30 && $limit) 
        {
            $content = ($stripTags ? strip_tags($content) : $content);
            $content = explode(' ', $content, $limit+1);
            array_pop($content);
            if ($ellipsis) 
            {
                array_push($content, '...');
            }
            $content = implode(' ', $content);
        }
        return $content;
    }
}

?>