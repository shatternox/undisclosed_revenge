<?php
include "tokengenerator.php";

class Payment {
  public $totalPayment;
  public $token;
}

if (isset($_POST['payment_data'])) {

  $payment_data = $_POST['payment_data'];
  $data = unserialize($payment_data);

  if ($data) {
    if (is_numeric($usr->totalPayment) && $usr->totalPayment > 1 &&  $usr->token === $paymentToken->secrettoken) {
      echo "Payment is valid!";
    } else {
      echo "Payment is not valid!";
    }

  } 
}