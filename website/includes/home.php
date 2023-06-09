    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Welcome To <br>
                        <span>
                          Magic Survey
                        </span>
                      </h1>
                      <div class="btn-box">
                        <?php if (isset($_SESSION['user_id'])) { ?>
                          <a href="homepage.php" class="btn-1">
                            Click Here
                          </a>
                        <?php } else { ?>
                          <a href="login.php" class="btn-1">
                            Click Here
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              This Website is made by Team Blue <br> (Phat Tran, Bryce Lin, C.J. Villanueva, Daniel Currey, and Logan Blakeborough)
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="free/images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <div class="body_bg layout_padding">

  </div>
  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="footer_contact">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="box">
        <a href="" class="img-box">
          <img src="free/images/location.png" alt="" class="img-1">
          <img src="free/images/location-o.png" alt="" class="img-2">
        </a>
        <a href="" class="img-box">
          <img src="free/images/call.png" alt="" class="img-1">
          <img src="free/images/call-o.png" alt="" class="img-2">
        </a>
        <a href="" class="img-box">
          <img src="free/images/envelope.png" alt="" class="img-1">
          <img src="free/images/envelope-o.png" alt="" class="img-2">
        </a>
      </div>
    </div>


  </section>


  <!-- end info section -->