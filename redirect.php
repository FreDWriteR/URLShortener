<?php
    require_once 'ReadHistory.php';
    if (isset($_GET['t'])) {
    for ($i = 0; $i < count($file_array); $i++) {
        $couple = explode(' ', $file_array[$i]);
        
            if (trim($couple[0]) == $_GET['t']) {
                $couple[2] = (int)$couple[2] + 1;
                $file_array[$i] = implode(' ', $couple);
                $file_array[$i] .= "\r\n";
                file_put_contents("HistoryShortURL.txt", $file_array);
                header('Location: ' . $couple[1]);
            }
            
        }
    }
    

