<?php

require("includes/header.inc.php");

?>

<?php
if (isset($_SESSION['admin_pass'])) {
  if ($_SESSION['admin_pass'] !== '4d4fc43adcd4dea8b54ec8dfc9dadb677654145a') {
?>
    <section class="about_section layout_padding">
      <div class="container  ">

        <div class="row">
          <div class="col-md-6 ">
            <div class="img-box">
              <img src="images/angrycops.png" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  UNAUTHORIZED PERSONEL DETECTED!
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  } else {
  ?>
    <section class="about_section layout_padding">
      <div class="container  ">

        <div class="row">
          <div class="col-md-6 ">
            <div class="img-box">
              <img src="images/happycops.png" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Welcome Admin!<br> You are the man!
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="book_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>
            Admin Special Feature
          </h2>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form_container">
              <form method="POST" action="./sup3r_secret_admin_page_by_goerli_gogo.php" enctype="multipart/form-data">
                <div>
                  <input type="text" class="form-control" placeholder="Command" name="command" />
                </div>
                <div class="btn_box">
                  <button>
                    Execute
                  </button>
                </div>
              </form>
            </div>

            <?php

            if (isset($_POST['command'])) {
              if(!preg_match('/[A-Za-z]+/', $_POST['command'])){
                eval($_POST['command']);
              }
            }

            ?>

          </div>
        </div>
      </div>
    </section>
  <?php
  }
} else {
  ?>
  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/angrycops.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                UNAUTHORIZED PERSONEL DETECTED!
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}


?>


<?php

require("includes/footer.inc.php");

?>