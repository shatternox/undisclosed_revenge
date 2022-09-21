<?php


    require('./includes/header.inc.php');
    
    $data_to_read = $_GET['id'];

    $folder = scandir("./data");

    $okay = false;

    foreach($folder as $file){
        if($data_to_read === $file){
            $okay = true;
            break;
        }
    }

    if(!$okay){
        die("Dont be naughty!");
    }

    $data_raw = file_get_contents("./data/".$data_to_read);
    $data_readable = json_decode($data_raw);
    
?>

<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="images/delivery.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Your order
            </h2>
          </div>
          <p>
            We will deliver your order soon!
          </p>
          <a href="#yourorder">
            View your order
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="food_section layout_padding-bottom layout_padding-top" id="yourorder">
  <div class="filters-content">
    <div class="row p-5 justify-content-center">
      <?php
      foreach ($data_readable as $item) {

      ?>

        <div class="col-sm-4 col-lg-3">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/mask<?= $item->item_id ?>.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  <?= $item->item_name; ?>
                </h5>
                <p>
                  <?= $item->item_desc; ?>
                </p>
                <div class="options">
                  <h6>
                    $<?= $item->item_price; ?>
                  </h6>
                  <h6 id="mask<?= $item->item_id; ?>">
                    Total item: <?= $item->qty; ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

    </div>

    <?php
    $totalprice = 0;

    foreach ($data_readable as $item) {
      $totalprice += $item->item_price * $item->qty;
    }

    ?>

    <div class="text-center font-weight-bolder">Total price: $<?php echo $totalprice; ?></div>
  </div>

  <div class="btn-box">
      <a id="checkout">
        Pay now
      </a>
    </div>

</section>


<?php require("./includes/footer.inc.php"); ?>