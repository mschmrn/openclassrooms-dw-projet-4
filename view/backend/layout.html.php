<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site officiel de Jean Forteroche - <?= $pageTitle ?></title>
    <meta name="description" content="Jean Forteroche, écrivain, travaille sur son prochain roman, Un Billet simple pour l'Alaska et le publie par épisode en ligne" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Oswald:wght@300;400&family=Vidaloka&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/scss/custom.css">
     <!-- Favicon -->
    <link rel="shortcut icon" href="../public/images/logo.svg">
    <!-- FontAwesome -->
    <link href="public/fontawesome-5.14.0/css/all.css" rel="stylesheet"> <!--load all styles -->
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yvsz2xtnu2mlivr71d25ksgyoh7onicfwfdaw77m0qqiizkp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body> 
    <div class="container-fluid col-12"> 
        <div class="row">                  
            <?php if(isset($_SESSION["username"])){ ?>
                <!-- SIDEBAR -->
                <div class="col-2 col-sm-2 col-md-1 col-lg-3 col-xl-2 p-0 bg-secondary">
                    <aside id="sidebar" class="col-12 sidebar p-0 vh-100">
                        <?php include_once 'sidebar.php'; ?>
                    </aside>
                </div>
                <!-- MAIN PAGE -->
                <div class="col-10 col-sm-10 col-md-11 col-lg-9 col-xl-10 bg-info p-0">
                    <!-- HEADER-->
                    <header class="col-12 header d-flex backend p-0 border-bottom border-grey">
                        <?php include 'header.php'; ?>
                    </header>
                    <!-- PAGE CONTENT-->
                    <main class="col-12 main ">
                        <?= $pageContent; ?>
                    </main>
                </div>    
            <?php } else { ?>
                <div class="col-12 bg-info p-0"><!-- Login.php -->
                    <!-- PAGE CONTENT-->
                    <main class="main">
                        <?= $pageContent; ?>
                    </main>
                </div> 
            <?php } ?>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
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
    <!-- Scripts JS -->
    <script src="public/js/ajax.js"></script>
    <script src="public/js/images.js"></script>
    <script src="public/js/modal.js"></script>
    <script src="public/js/app.js"></script>
</body>
</html>

