<?php

include('header.php')
?>

<section class="hero-section text-center">
  <h3 class="my-5">Get Involved</h3>

  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4">
        <img src="assets/image/donate.png" alt="" class="w-75">
        <br><br>
        <button class="btn btn-outline-dark my-2 my-sm-0 mr-2" data-bs-toggle="modal" data-bs-target="#donateModal">Donate</button>
        <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Help us out!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                You can make a donation to us through our crowdfunding website.
                The website link is <a href="#">www.ecofund.com.my</a>.
                <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Visit Site</button>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>

      <div class="col-12 col-md-4">
        <img src="assets/image/volunteer.png" alt="" class="w-75">
        <br><br>
        <button class="btn btn-outline-dark my-2 my-sm-0 mr-2" data-bs-toggle="modal" data-bs-target="#volunteerModal">Volunteer</button>
        <div class="modal fade" id="volunteerModal" tabindex="-1" role="dialog" aria-labelledby="volunteerModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Help us out!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                Currently these are the voluteering positions available:
                <br>
                <ul style="margin:auto; width:fit-content;" class="mt-3">
                  <li>Social Media Advocate</li>
                  <li>Handicraft Instructor</li>
                  <li>Tutor for Children</li>
                </ul>
                <br>
              </div>
              <div class="modal-footer">
                <a href="contact.php"><button type="button" class="btn btn-success">Contact Us</button></a>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>

      <div class="col-12 col-md-4">
        <img src="assets/image/team.png" alt="" class="w-75">
        <br><br>
        <button class="btn btn-outline-dark my-2 my-sm-0 mr-2" data-bs-toggle="modal" data-bs-target="#jobModal">Work With Us</button>
        <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="volunteerModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Join our team!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                Currently these are the vacancies available:
                <br>
                <ul style="margin:auto; width:fit-content;" class="mt-3">
                  <li>Project Manager</li>
                  <li>IT Support</li>
                  <li>HR Assistant</li>
                </ul>
                <br>
              </div>
              <div class="modal-footer">
                <a href="contact.php"><button type="button" class="btn btn-success">Contact Us</button></a>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>
    </div>
  </div>
</section>

<br>
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <br><br>
      <h3>Frequently Asked Questions</h3>
      <br>
      <p class="togglefaq bg-success-subtle m-0 p-3 d-flex justify-content-between">1. Can anyone volunteer? <i class="fa-solid fa-plus align-self-center"></i></p>
      <div class="faqanswer text-center p-2 border border-2 border-success-subtle" style="display:none;">
        <p>Although we encourage everyone to volunteer, it is only open to Malaysian citizens above the age of 18.</p>
      </div>
      <br>
      <p class="togglefaq bg-success-subtle m-0 p-3 d-flex justify-content-between">2. What can I donate? <i class="fa-solid fa-plus align-self-center"></i></p>
      <div class="faqanswer text-center p-2 border border-2 border-success-subtle" style="display:none;">
        <p>Other than monetary donations, we also accept new or used educational books that are in good conditions.</p>
      </div>
      <br>
      <p class="togglefaq bg-success-subtle m-0 p-3 d-flex justify-content-between">3. How much profit is being donated? <i class="fa-solid fa-plus align-self-center"></i></p>
      <div class="faqanswer text-center p-2 border border-2 border-success-subtle" style="display:none;">
        <p>At EcoTribe, we vouch to donate 10% of our profits to the cause, while reinvesting at least 30% back into the business.</p>
      </div>
      <br>
      <p class="togglefaq bg-success-subtle m-0 p-3 d-flex justify-content-between">4. Are the rattan products long lasting? <i class="fa-solid fa-plus align-self-center"></i></p>
      <div class="faqanswer text-center p-2 border border-2 border-success-subtle" style="display:none;">
        <p>Rattan products are extremely durable, lasting for a decade if taken care of properly. Not only are they waterproof, they are also resistant to UV damage.</p>
      </div>
      <br>
    </div>
  </div>
</div>
<?php include('footer.php') ?>