<?php
Class Token {
    public $secrettoken;

    function __construct(){
        $this->secrettoken = sha1(uniqid());
    }
}

$paymentToken = new Token();

$admin_addressBIP39 = "0x6bb8128182ab85E9f87cedCb14e50a6d300A1D6A";
$admin_pass = "4d4fc43adcd4dea8b54ec8dfc9dadb677654145a";
$secret_path = "sup3r_secret_admin_page_by_goerli_gogo.php";
?>