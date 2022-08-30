<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/CSS/style.css"/>
    <link rel="stylesheet" href="public/CSS/form.css"/>
    <title>Casting</title>
</head>
<body>

    <header>

        <a href="index.php"><img class="home_icon" src="./public/images/home-icon.png" alt="home-icon"></a>

    </header>

    <main>

        <?=
             $content;
            // alimenté par ob_get_clean 
        ?>

    </main>

    <footer>



    </footer>
    <script src="./public/js/script.js"></script>
</body>
</html>