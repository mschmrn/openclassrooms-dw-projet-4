# [En cours] Projet 4 OpenClassrooms : Concevez une carte interactive de location de vélos

[![forthebadge](https://forthebadge.com/images/badges/uses-html.svg)](http://forthebadge.com)  [![forthebadge](https://forthebadge.com/images/badges/uses-css.svg)](http://forthebadge.com)  [![forthebadge](https://forthebadge.com/images/badges/made-with-javascript.svg)](http://forthebadge.com)

Vous développerez une application de blog simple en PHP et avec une base de données MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture). 

## Instructions

Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés.

L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE, pour que l'auteur n'ait pas besoin de rédiger son histoire en HTML (on comprend qu'il n'ait pas très envie !).

### Fonctionnalités

- Vous développerez en PHP sans utiliser de framework pour vous familiariser avec les concepts de base de la programmation. 

- Le code sera construit sur une architecture MVC. 

- Vous développerez autant que possible en orienté objet (au minimum, le modèle doit être construit sous forme d'objet).

## URL du site hébergé

* [Site de l'auteur](http://projet-4-oc.ismaeljouhari.com/)

## Versions
**Dernière version stable :** 1.0
**Dernière version :** 1.0
Liste des versions : [Cliquer pour afficher](https://github.com/mschmrn/openclassrooms-dw-projet-3/contributors/tags)

## Auteurs

* **Ismaël Jouhari** _alias_ [@mschmrn](https://github.com/mschmrn)

Lisez la liste des [contributeurs](https://github.com/mschmrn/openclassrooms-dw-projet-3/contributors) pour voir qui a contribué au projet.

openclassrooms-dw-projet-4
├─ .gitignore
├─ .htaccess
├─ Controller
│  ├─ Admin.php
│  ├─ Article.php
│  ├─ Comment.php
│  ├─ Contact.php
│  ├─ Controller.php
│  └─ User.php
├─ Model
│  ├─ Admin.php
│  ├─ Article.php
│  ├─ Comment.php
│  ├─ Contact.php
│  ├─ Model.php
│  └─ User.php
├─ README.md
├─ index.php
├─ libraries
│  ├─ .DS_Store
│  ├─ Admin.php
│  ├─ Application.php
│  ├─ Database.php
│  ├─ Http.php
│  ├─ Renderer.php
│  ├─ Session.php
│  ├─ Text.php
│  └─ autoload.php
├─ public
│  ├─ .DS_Store
│  ├─ fontawesome-5.14.0
│  ├─ images
│  ├─ js
│  │  ├─ ajax.js
│  │  ├─ app.js
│  │  ├─ images.js
│  │  └─ modal.js
│  ├─ node_modules
│  └─ scss
│     ├─ .DS_Store
│     ├─ build
│     │  └─ .gitignore
│     ├─ custom.css
│     └─ custom.scss
└─ view
   ├─ backend
   │  ├─ add_user.html.php
   │  ├─ admin
   │  │  └─ success.html.php
   │  ├─ articles
   │  │  ├─ drafts.html.php
   │  │  ├─ edit.html.php
   │  │  └─ index.html.php
   │  ├─ comments.html.php
   │  ├─ header.php
   │  ├─ index.html.php
   │  ├─ layout.html.php
   │  ├─ list
   │  │  ├─ articles.php
   │  │  ├─ comments.php
   │  │  ├─ drafts.php
   │  │  └─ users.php
   │  ├─ login.html.php
   │  ├─ logout-modal.php
   │  ├─ sidebar.php
   │  ├─ trash.html.php
   │  └─ users.html.php
   └─ frontend
      ├─ articles
      │  ├─ index.html.php
      │  └─ show.html.php
      ├─ footer.php
      ├─ form
      │  └─ contact.html.php
      ├─ header.php
      ├─ index.html.php
      ├─ layout.html.php
      └─ preview.html.php
