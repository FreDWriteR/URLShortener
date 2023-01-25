<?php
    if (isset($_SESSION['shortToken'])) {
        $file = fopen('HistoryShortURL.txt', 'a');
        if (isset($_SESSION['longURL'])) {
            fwrite($file, $_SESSION['shortToken']. ' ' . $_SESSION['longURL'] . ' 0' . PHP_EOL);
        }
    }


