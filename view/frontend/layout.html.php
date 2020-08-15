<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Title -->
        <title>Site officiel de Jean Forteroche - <?= $pageTitle ?></title>
        <!-- Description -->
        <meta name="description" content="Jean Forteroche, écrivain, travaille sur son prochain roman, Un Billet simple pour l'Alaska et le publie par épisode en ligne" />
        <meta name="robots" content="index,follow" />
        <!-- Viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Oswald:wght@300;400&family=Vidaloka&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../public/scss/custom.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="../public/images/logo.svg">
    </head>
    <body>
        <?php
            require_once('header.php');
            echo $pageContent;
            require_once('footer.php');
        ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous">
        </script>
    </body>
</html>

