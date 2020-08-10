<?php

class Date
{
    /**
     * @method display Displays date on French European format
     * @return timeStamp Value modified
     */

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
