@include('header')
  
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>About Our <span>CEO</span></h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('index/images/ceo.jpg')}}" alt="" />
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

  @include('footer')