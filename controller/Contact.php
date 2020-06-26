<?php

namespace Controller;

class Contact
{
    public function contact()
    {
        $pageTitle = "Contact";
        \Renderer::render('form/contact', compact('pageTitle'));
    }
}