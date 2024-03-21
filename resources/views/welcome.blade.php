@Include('header')

    <!-- slider section -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Glossy Kiss
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/product.jpg')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                     Beauty Blossoms
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/product2.jpg')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Secret Kiss
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/product3.jpg')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li
            data-target="#customCarousel1"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Our <span>Services</span></h2>
          <p>
            At Dynamic One, our services revolve around 
            enhancing online security through innovative cryptographic 
            solutions. We provide a seamless integration of captivating 
            captchas, blending user engagement with robust authentication.
          </p>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s1.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Currency Wallet</h5>
                <p>
                  At Dynamic One, our services are centered around 
                  fortifying online security through cutting-edge cryptographic 
                  solutions. In addition to our captivating captcha authentication, 
                  we provide seamless integration with currency wallets. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s2.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Security Storage</h5>
                <p>
                  At Dynamic One, our commitment to security 
                  extends to our innovative 'Security Storage' feature. 
                  With military-grade encryption, our storage solutions
                  offer a fortress for your digital assets.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s3.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Expert Support</h5>
                <p>
                  At Dynamic One, we take pride in offering unparalleled 
                  expert support to our users. Our dedicated team of experts 
                  stands ready to provide personalized assistance and guidance 
                  on all aspects of our services.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>About Our <span>CEO</span></h2>
        <p>
          Our CEO is handsome!
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('index/images/ceo.png')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>Reynard Cayetano</h3>
            <p>
            Hardworking and promising young talent, 
            driven by ambition and dedication. Eager
            to excel and make a mark in their chosen field, 
            with a relentless pursuit of success and excellence
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Why Choose <span>Us</span></h2>
      </div>
      <div class="why_container">
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w1.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Expert Management</h5>
            <p>
              Our commitment to excellence extends to our 
              'Expert Management' services. Entrust your cryptographic journey 
              to our seasoned professionals who skillfully navigate the dynamic 
              landscape of digital security. 
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w2.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Secure Investment</h5>
            <p>
              Our platform seamlessly integrates cutting-edge cryptographic solutions, 
              offering a fortress of protection for your online interactions.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w3.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Instant Trading</h5>
            <p>
              We redefine convenience with our groundbreaking 'Instant Trading' feature. 
              Seamlessly integrated into our platform, this service allows users to execute 
              cryptocurrency trades swiftly and effortlessly.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w4.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Happy Customers</h5>
            <p>
              We prioritize user experience through seamless captchas,
               secure currency wallets, and expert support, ensuring a delightful 
               journey in the crypto realm. Our dedication to customer happiness 
               goes beyond just functionality — it's about creating a trusted 
               community where every interaction is rewarding.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end why section -->

  <!-- team section -->
  <section class="team_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2 class="">
          Our <span> Team</span>
        </h2>
      </div>

      <div class="team_container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/ceo.png')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Reynard Cayetano
                </h5>
                <p>
                  CEO
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/rona.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Rona
                </h5>
                <p>
                  CO CEO
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/missy.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Missy Cheng
                </h5>
                <p>
                  Head Admin
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/febe.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Febe
                </h5>
                <p>
                  Admin
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/babeth.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  babeth
                </h5>
                <p>
                  Admin
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/satsuki.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Satsuki
                </h5>
                <p>
                  Admin
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/kharra.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Kharra
                </h5>
                <p>
                  Admin
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/maricel.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Marecel
                </h5>
                <p>
                  Editor
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/joycelle.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Joycelle
                </h5>
                <p>
                 Assistant Editor
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('index/images/althea.jpg')}}" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Althea
                </h5>
                <p>
                 Activator
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end team section -->

 @include('footer') 




