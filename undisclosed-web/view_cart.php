<?php
require('./includes/header.inc.php');

if (empty($_SESSION['cart'])) {
?>
  <script>
    document.location = "index.php"
  </script>
<?php
}
?>
<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="images/angrykaren.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Ready for checkout
            </h2>
          </div>
          <p>
            Make sure you purchase the right item! We don't accept refund!
          </p>
          <a href="#yourcart">
            View your cart
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="food_section layout_padding-bottom layout_padding-top" id="yourcart">
  <div class="filters-content">
    <div class="row p-5 justify-content-center">
      <?php
      foreach ($_SESSION['cart'] as $item) {

      ?>

        <div class="col-sm-4 col-lg-3">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/mask<?= $item['item_id'] ?>.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  <?= htmlspecialchars($item['item_name']); ?>
                </h5>
                <p>
                  <?= htmlspecialchars($item['item_desc']); ?>
                </p>
                <div class="options">
                  <h6>
                    $<?= htmlspecialchars($item['item_price']); ?>
                  </h6>
                  <h6 id="mask<?= $item['item_id']; ?>">
                    Total item: <?= htmlspecialchars($item['qty']); ?>
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

    foreach ($_SESSION['cart'] as $item) {
      $totalprice += $item["item_price"] * $item["qty"];
    }

    ?>

    <div class="text-center font-weight-bolder">Total price: $<?php echo htmlspecialchars($totalprice); ?></div>
    
    <div class="btn-box">
      <a id="checkout" href="#">
        Pay now
      </a>
    </div>
  </div>

</section>



<?php require('./includes/footer.inc.php'); ?>