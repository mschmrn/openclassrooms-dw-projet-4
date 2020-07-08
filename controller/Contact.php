<?php

namespace Controller;

class Contact extends Controller
{
    protected $modelName = \Model\Contact::class;

    public function contact()
    {
        $pageTitle = "Contact";
        \Renderer::render('frontend','form/contact', compact('pageTitle'));
    }
}