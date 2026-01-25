<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="films.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Internet film reviews</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="films.php">Review List</a></li>
                <li><a href="editreview.php">Add a new review</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IFDB 2023</footer>
    </body>
</html>