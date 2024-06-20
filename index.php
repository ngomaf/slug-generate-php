<?php
    
    // open session to memory variable
    session_start();

    if(!isset($_SESSION['arr'])) $_SESSION['arr'] = array();
    $last = (!empty($_SESSION['arr']))? end($_SESSION['arr']): "Slug generate PHP";

    // condition to reset session
    if(isset($_GET['clean'])) {
        session_start();
        session_unset();
        session_destroy();
    }

?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fortwork.ico" rel="icon" type="image/png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Slug generate PHP</title>
</head>
<body>
    <header class="clean">
        <form action="" method="get">
            <a class="btn" href="index.php">Home</a>
            <input type="hidden" name="clean" value="true">
            <button type="submit">Clean</button>
        </form>
    </header>
    <main>
        <p class="legend">See here your result</p>
        <h1><?= $last ?></h1>
        <form action="generator.php" method="get">
            <div class="left">
                <label for="phrase">Phrase</label><br>
                <input type="text" name="phrase" id="phrase" placeholder="Enter your phrase..." autofocus required>
                <button type="submit">Generate</button>
            </div> <!-- /.left -->
            <div class="right">
                <p>Generation slug history.</p>

                <ol>
                    <?php foreach($_SESSION['arr'] as $key => $value ): 
                        $key++;
                    ?>
                    <li><?= $key ?>. <?= $value ?></li>
                    <?php endforeach; ?>
                </ol>
            </div> <!-- /.right -->
        </form>

        <p class="button">&copy; ngoma fortuna 06.2024</p>
    </main>
</body>
</html>