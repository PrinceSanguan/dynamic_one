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
                                  <h1>Glossy Kiss</h1>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="img-box">
                                  <img src="{{ asset('index/images/product.jpg') }}" alt="" />
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
                                  <h1>Beauty Blossoms</h1>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="img-box">
                                  <img src="{{ asset('index/images/product2.jpg') }}" alt="" />
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
                                  <h1>Secret Kiss</h1>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="img-box">
                                  <img src="{{ asset('index/images/product3.jpg') }}" alt="" />
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
          <ol class="carousel-indicators">
              <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
              <li data-target="#customCarousel1" data-slide-to="1"></li>
              <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
      </div>
  </section>
    <!-- end slider section -->
  </div>

 @include('footer') 




