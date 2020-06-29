<?php

namespace Controller;

class Contact
{
    public function contact()
    {
        $pageTitle = "Contact";
        \Renderer::render('frontend','form/contact', compact('pageTitle'));
    }
}