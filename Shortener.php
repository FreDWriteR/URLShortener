<?php


class Shortener
{
    protected static $chars = "abcdfghjkmnpqrstvwxyz|ABCDFGHJKLMNPQRSTVWXYZ|0123456789";

    protected static $array_couples;
    
    public string $URLInHistory;
    
    public bool $isURLvalid;
    
    public bool $isURLExist;
    
    public string $shortToken;
    
    public function __construct($array_history){
        self::$array_couples = $array_history;
    }
    
    protected function isURLHistory($longURL): bool {
        if (count(self::$array_couples) > 0) {
            for ($i = 0; $i < count(self::$array_couples); $i++) {
                $couple = explode(' ', self::$array_couples[$i]);
                if (trim($couple[1]) == $longURL) {
                    $this->URLInHistory = $couple[1];
                    $this->shortToken = $couple[0];
                    return true;
                }
            }
        }
        $this->URLInHistory = '';
        return false;
    }
    
    protected function checkTheUrlForValidity($longURL): bool {
        $this->isURLvalid = filter_var($longURL, FILTER_VALIDATE_URL);
        return $this->isURLvalid;
    }
    
    protected function verifyUrlExists($longURL){
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_URL, $longURL);
        curl_setopt($ci, CURLOPT_NOBODY, true);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ci);
        $response = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        curl_close($ci);
        $this->isURLExist = (!empty($response) && $response != 404);
        return $this->isURLExist;
    }
    
    protected function getRandomToken() {
        $collections = explode('|', self::$chars);
        $token = '';
        for ($i = 0; $i < 2; $i++) {
            foreach($collections as $collection) {
               $token .= $collection[array_rand(str_split($collection))];
            }
        }
        $this->token = str_shuffle($token);
        return $this->token;
    }
    
    public function longToShort($longURL) {
        $this->URLInHistory = '';
        $this->isURLvalid = false;
        $this->isURLExist = false;
        if ($this->checkTheUrlForValidity($longURL) && $this->verifyUrlExists($longURL) && !$this->isURLHistory($longURL)) {
            
            $this->shortToken = $this->getRandomToken();
            
        }
        
    }
}
