<?php

include('./include/header.php');
?>

<section class="contact_section">

  <div class="breadcrumb-section">
    <h1 class="top_title">Contact US</h1>
  </div>

  <!-- <div class="contact_form">

        <form>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
              </div>
            </div>
          </form>

    </div>
     -->
  <div class="contact_form_container flex">
    <form class="contact_form">
      <h1>Contact Form</h1>
      <p>Please Enter your Credentials and leave your comment
      <p>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Write Your Comment Here:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Comment</button>
    </form>
    <div class="contact_form_right_side">
      <h1>FAQ</h1>
      <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum natus odio voluptatem dolor, quibusdam qui nesciunt laboriosam iure, quaerat et hic quo esse. Neque quas placeat aperiam fuga est autem.</p><br>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius consequatur illo id numquam a iure, similique placeat sequi quia veritatis voluptatibus aliquam quas pariatur excepturi itaque fugit veniam praesentium. Totam?</p><br>

          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas sequi, laborum fuga quo modi ab possimus repellat maxime porro eius! Voluptates est odio nobis architecto earum adipisci dicta accusamus laborum!</p><br> -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Can I get the seat that I want?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis perspiciatis nostrum omnis enim doloribus odio excepturi totam vitae? Et ab iure quae magnam voluptatem eaque. Iure mollitia reprehenderit tenetur nam.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              How Do I buy a Ticket?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit quia incidunt repudiandae. Ex, earum natus possimus autem eius minus dolorum in necessitatibus nihil, accusamus neque quisquam cupiditate consequatur consectetur. Non!</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Does The Price Changes?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim, accusamus eveniet sunt dicta quidem nesciunt vitae obcaecati suscipit? Explicabo quas eaque recusandae cupiditate nesciunt saepe ipsam modi obcaecati officiis.
              </p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Does The Price Changes?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim, accusamus eveniet sunt dicta quidem nesciunt vitae obcaecati suscipit? Explicabo quas eaque recusandae cupiditate nesciunt saepe ipsam modi obcaecati officiis.
              </p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Does The Price Changes?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim, accusamus eveniet sunt dicta quidem nesciunt vitae obcaecati suscipit? Explicabo quas eaque recusandae cupiditate nesciunt saepe ipsam modi obcaecati officiis.
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</section>

<section>
  <div class="map_header">
    <h1>View Our Location</h1>
  </div>
  <div class="map_content">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1527.9827142366742!2d-1.545903479910472!3d53.79890575284333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x86bdab5a74edbad7!2zNTPCsDQ3JzU3LjkiTiAxwrAzMic1MS41Ilc!5e0!3m2!1sen!2sbd!4v1649867201424!5m2!1sen!2sbd" width="1900" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>

<section class="our-partners-section">
  <h2>OUR PARTNERS</h2>
  <div class="our-partners flex">

    <div class="partner-logo no1"></div>
    <div class="partner-logo no2"></div>
    <div class="partner-logo no3"></div>
    <div class="partner-logo no4"></div>

  </div>
</section>



<?php
include('./include/footer.php');
?>