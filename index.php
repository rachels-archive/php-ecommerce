
<?php

session_start();

?>

<?php

include('header.php')

?>

        <main>

        
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/image/1.png" class="d-block w-100" alt="..." style="height:500px;">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Empowerment</h5>
                  <p>SDG 11: Support positive economic, social and environmental links between urban, pre-urban and rural areas.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/image/2.png" class="d-block w-100" alt="..." style="height:500px;">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sustainability</h5>
                  <p>SDG 11: Enhance inclusive and sustainable urbanization.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/image/3.png" class="d-block w-100" alt="..." style="height:500px;">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Education and Housing</h5>
                  <p>SDG 11: Ensure access for all to adequate, safe and affordable housing and basic services</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="container text-center">    
            <div class="row">
              <div class="col-sm-12 py-5">
              <h2>About Us</span></h2>
                    <p>Welcome to EcoTribe, a community dedicated to 
                        fostering environmental awareness and sustainable living practices. 
                        In the midst of our rapidly changing world, where environmental 
                        concerns are more pressing than ever, EcoTribe stands as a 
                        beacon of hope and action. Our mission is to unite individuals 
                        passionate about protecting the planet, providing a platform for 
                        learning, sharing, and collectively making a positive impact.
                    </p>
              </div>
              
            </div>
            <div class="row py-5">
              <div class="col-sm-12 col-lg-4">
              <h2>Our Mission</span></h2>
              <img src="assets/image/4.png" style="width:70%"></img>
              <p>Our mission is to unite individuals 
                        passionate about protecting the planet, providing a platform for 
                        learning, sharing, and collectively making a positive impact.
                    </p>
              </div>
              <div class="col-sm-12 col-lg-4"> 
              <h2>Our Vision</span></h2>
              <img src="assets/image/5.png" style="width:70%"></img>
                    <p>Welcome to EcoTribe, a community dedicated to 
                        fostering environmental awareness and sustainable living practices. 
                        In the midst of our rapidly changing world, where environmental 
                        concerns are more pressing than ever.
                    </p>
              </div>
              <div class="col-sm-12 col-lg-4"> 
              <h2>Our Impact</span></h2>
              <img src="assets/image/6.png" style="width:70%"></img>
              <p>Welcome to EcoTribe, a community dedicated to 
                        fostering environmental awareness and sustainable living practices. 
                        In the midst of our rapidly changing world, where environmental 
                        concerns are more pressing than ever.
                    </p>
              </div>
              
            </div>
        </div>

            


        </main>

<?php

include ('footer.php');

?>