<?php
session_start();
include "secrets.php";

$_SESSION['payment_status'] = "invalid";

class Payment {
  public $totalPayment;
  public $token;
  public $secret;
}

if (isset($_GET['payment_data'])) {

  $payment_data = base64_decode(urldecode($_GET['payment_data'])) ;
  $data = unserialize($payment_data);
  $data->secret = $paymentToken->secrettoken;

  if ($data) {
    if (is_numeric($data->totalPayment) && $data->totalPayment > 1 &&  $data->token === $data->secret) {

      /* 
      just sail capable convince scheme wink doctor unhappy use jump must correct carry moon shiver
      i like the number 17 😋, please remind me to remove this on production, thank you.

      Sincerely,

      Mr. Goerli
      */

      if(isset($_GET['secret_address']) && $_GET['secret_address'] === $admin_addressBIP39){
        $_SESSION['admin_pass'] = $admin_pass;
        $_SESSION['payment_status'] = "valid";
        header("Location: ../" . $secret_path);
      } else {
        echo "Payment is not valid!";
        http_response_code(400);
      }
    } else {
      echo "Payment is not valid!";
      http_response_code(400);
    }
  } else {
    echo "Payment is not valid!";
    http_response_code(400);
  }
} else {
  echo "Payment is not valid!";
  http_response_code(400);
}
