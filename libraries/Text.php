<?php

class Text
{
    /**
     * Displays an HTML template and insert data
     * @method truncate Limit the number of words in description
     * @method read_time Gives an estimated reading time
     */

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

    static public function read_time($string) 
    {
        $string = preg_replace('/\s+/', ' ', trim($string));
        $words = explode(" ", $string);
        
        $result = count($words)/200;
        return round($result);
    }
}

?>