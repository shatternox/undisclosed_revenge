<?php
Class Token {
    public $secrettoken;

    function __construct(){
        $this->secrettoken = sha1(uniqid());
    }
}

$paymentToken = new Token();
?>