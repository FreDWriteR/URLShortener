<?php
    require_once 'ReadHistory.php';
    require_once 'Shortener.php';
    
    $ShortenURL = new Shortener($file_array);
    session_start();
    if (isset($_POST['longURL'])) {
        $longURL = $_POST['longURL'];
    }
    
    $ShortenURL->longToShort($longURL);
    
    
    if (!$ShortenURL->isURLvalid) {
        $_SESSION['wrongURL'] = 'Не верный формат URL';
        print $_SESSION['wrongURL'];
        exit;
    }
    
    if (!$ShortenURL->isURLExist) {
        $_SESSION['wrongURL'] = 'URL не существует';
        print $_SESSION['wrongURL'];
        exit;
    } 
    if ($ShortenURL->URLInHistory) {
        $_SESSION['shortToken'] = $ShortenURL->shortToken;
        $_SESSION['shortURL'] = 'http://urlshortener/'.$ShortenURL->shortToken;
        print $_SESSION['shortURL'];
        exit;
    }
    else {
        $_SESSION = [];
        $_SESSION['shortURL'] = 'http://urlshortener/'.$ShortenURL->shortToken;
        $_SESSION['shortToken'] = $ShortenURL->shortToken;
        $_SESSION['longURL'] = $longURL;
        require_once 'writeHistory.php';
        print $_SESSION['shortURL'];
    }
    
    
    
    


