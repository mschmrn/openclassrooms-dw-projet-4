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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/yvsz2xtnu2mlivr71d25ksgyoh7onicfwfdaw77m0qqiizkp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body> 
    <div class="container-fluid col-12"> 
        <div class="row">                  
            <?php if(isset($_SESSION["username"])){ ?>
                <div class="col-2 p-0 bg-secondary">
                    <aside id="sidebar" class="col-12 sidebar p-0 vh-100">
                        <?php include 'sidebar.php'; ?>
                    </aside>
                </div>
                <div class="col-10 bg-info p-0">
                    <header class="header col-12 p-0 border-bottom border-grey">
                        <?php include 'header.php'; ?>
                    </header>
                    <main class="main col-12">
                        <?= $pageContent; ?>
                    </main>
                </div>    
            <?php } else { ?>
                <div class="col-12 bg-info p-0">
                    <main class="main">
                        <?= $pageContent; ?>
                    </main>
                </div> 
            <?php } ?>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- Scripts JS -->
    <script src="public/js/tinymce.js"></script>
    <script src="public/js/app.js"></script>

</body>
</html>

