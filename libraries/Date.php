<?php


class Date
{
    static public function display(string $timeStamp)
    {
        setlocale(LC_TIME, "fr_FR");
        $timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
        return $timeStamp;
    }
}

?>
