<?php

namespace Controller;

class Contact extends Controller
{
    /**
     * @method isInjected Prevent user from injecting data
     * @method mail Process mail sending
     */

    protected $modelName = \Model\Contact::class;

    public function contact_author()
    {
        $pageTitle = "Contact";
        \Renderer::render('frontend','form/contact', compact('pageTitle'));
    }

    // Function to validate against any email injection attempts
    public function IsInjected($str)
    {
        $injections = array('(\n+)',
                    '(\r+)',
                    '(\t+)',
                    '(%0A+)',
                    '(%0D+)',
                    '(%08+)',
                    '(%09+)'
                    );
        $inject = join('|', $injections);
        $inject = "/$inject/i";
        if(preg_match($inject,$str))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function send_mail()
    {
        // Email info
     
        $to    = "ismael.jouhari@gmail.com";
        $from  = "ismael.jouhari@lebensraum.fr";
  
        ini_set("SMTP", "smtp.ismaeljouhari.com");   

        $JOUR  = date("Y-m-d");
        $HEURE = date("H:i");
        $Subject = htmlspecialchars($_POST["topic"]);
        $Content = htmlspecialchars($_POST["content"]);
        $Sender = htmlspecialchars($_POST["name"]);
        $SenderMail = htmlspecialchars($_POST["email"]);
        $mail_Data = "";
        $mail_Data .= "<html> \n";
        $mail_Data .= "<head> \n";
        $mail_Data .= "<title> Subject </title> \n";
        $mail_Data .= "</head> \n";
        $mail_Data .= "<body> \n";
        $mail_Data .= "À destination de Jean Forteroche : <b> $Content </b> <br> \n";
        $mail_Data .= "<br> \n";
        $mail_Data .= "Message envoyé par : $Sender <br> \n";
        $mail_Data .= "<br> \n";
        $mail_Data .= "Adresse d'expedition : $SenderMail <br> \n";
        $mail_Data .= "<br> \n";
        $mail_Data .= "</body> \n";
        $mail_Data .= "</HTML> \n";
        $headers  = "MIME-Version: 1.0 \n";
        $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
        $headers .= "From: $from  \n";
        $headers .= "Disposition-Notification-To: $from  \n";

        // High priority message
        $headers .= "X-Priority: 1  \n";
        $headers .= "X-MSMail-Priority: High \n";
        $CR_Mail = TRUE;
        $CR_Mail = @mail ($to, $Subject, $mail_Data, $headers);

        if ($CR_Mail === FALSE)
        {
            echo "Erreur durant envoi du mail, veuillez réessayer";
        }
        else
        {
            echo "Votre mail a bien été envoyé.";
        }

    }
}