<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST) && $_POST['action'] === "add_to_cart") {

    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_desc = $_POST['item_desc'];
    $qty = $_POST['qty'];

    $available = true;

    $index = 0;
    foreach ($_SESSION['cart'] as $item) {

        if ($item["item_id"] === $item_id) {
            $available = false;

            $_SESSION['cart'][$index]['qty'] += $qty;

            break;
        }
        $index += 1;
    }

    if ($available) {

        $item_add = [
            "item_id" => $item_id,
            "item_name" => $item_name,
            "item_price" => $item_price,
            "item_desc" => $item_desc,
            "qty" => $qty
        ];
        array_push($_SESSION['cart'], $item_add);
    }
} else if (isset($_POST) && $_POST['action'] === "empty_cart") {
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();
} else if (isset($_POST) && $_POST['action'] === "checkout" && $_SESSION['payment_status'] === "valid") {
    
    $filename = sha1(uniqid());

    $file = fopen("../data/". $filename, "w") or die("Fail to open file");
    fwrite($file, json_encode($_SESSION['cart']));
    
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();

    echo $filename;


}
