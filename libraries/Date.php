<?php

class Date
{
    static public function display(string $timeStamp, bool $details = false)
    {
        setlocale(LC_TIME, "fr_FR");
        if ($details)
        {
            $timeStamp = strftime('%d %B %G à %H:%M', strtotime($timeStamp));
        }
        else
        {
            $timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
        }
        return $timeStamp;
    }
}

?>
