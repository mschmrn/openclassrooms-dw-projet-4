<?php

namespace Controller;

class Contact extends Controller
{
    /**
     * @method isInjected Prevent user from injecting data
     * @method mail Process mail sending
     */

    protected $modelName = \Model\Contact::class;

    public function contact()
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

    public function mail()
    {
        if(!isset($_POST['send']))
        {
            //This page should not be accessed directly. Need to submit the form.
            echo "error; you need to submit the form!";
        }

        // Email info
        $recipient = "ismael.jouhari@gmail.com";
        $subject = $_POST["topic"];
        $sender = $_POST["name"];
        $senderEmail = $_POST["email"];
        $message = $_POST["content"];

        //Validate first
        if(empty($sender) || empty($senderEmail))
        {
            echo "Name and email are mandatory!";
            exit;
        }

        if($this->IsInjected($senderEmail))
        {
            echo "Bad email value!";
            exit;
        }

        $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";
        
        // Headers
        $headers = "From: $recipient \r\n";
        $headers .= "Reply-To: $senderEmail \r\n";

        //Send the email!
        //mail($to,$email_subject,$email_body,$headers);
        mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>", $headers);

        //Confirmation
        echo 'message envoyé ';
    }
}