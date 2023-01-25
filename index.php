<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shortener</title>
        <script type="text/javascript" src="JS/jquery-3.6.3.js"></script>
        <script type="text/javascript" src="JS/ajaxquery.js"></script>
        <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="div-form">
            <h2>Укороти свой URL</h2>
            <form method="post" id="formToShort">
                <p><b>Длинный URL:</b><br><br>
                <input name="longURL" class="form-control" type="text" size="50" placeholder="Введи свой длинный URL"><br>
                <input type=submit class="btn btn-primary" value="УКОРОТИТЬ">
                <div id="result_form"></div>
                <?php
                    $_SESSION = [];
                ?>
            </form>
        </div>
    </body>
</html>
