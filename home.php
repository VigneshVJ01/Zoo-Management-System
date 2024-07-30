<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>

    <!-- Header Start -->
    <div class="container-fluid bg-dark p-0 mb-5">
      <div class="row g-0 flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
          <div
            class="header-bg h-100 d-flex flex-column justify-content-center p-5"
          >
            <h1 class="display-4 text-light mb-5">
              Enjoy Wonderful Day With Your Family
            </h1>
            <div class="d-flex align-items-center pt-4 animated slideInDown">
              <button
                type="button"
                class="btn-play"
                data-bs-toggle="modal"
                data-src="videos\COSTA RICA IN 4K 60fps HDR (ULTRA HD).mp4"
                data-bs-target="#videoModal"
              >
                <span></span>
              </button>
              <h6 class="text-white m-0 ms-4 d-none d-sm-block">Watch Video</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="owl-carousel header-carousel">
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-1.jpg" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-2.jpg" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-3.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Video Modal Start -->
    <div
      class="modal modal-video fade"
      id="videoModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
              <iframe
                class="embed-responsive-item"
                src=""
                id="video"
                allowfullscreen
                allowscriptaccess="always"
                allow="autoplay"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Video Modal End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>Welcome To Welcome To Interstellar Animal Kingdom</p>
            <h1 class="display-5 mb-4">
              Why You Should Visit
              <span class="text-primary">Interstellar Animal Kingdom</span> 
            </h1>
            <p class="mb-4">
            Experience the wonders of wildlife at Interstellar Animal Kingdom. Enjoy unique space-themed
            exhibits and diverse animal species. Perfect for families, with interactive programs and up-close encounters.
            Learn about conservation in an engaging setting. Explore scenic landscapes and themed events.
            Plan your visit for an out-of-this-world adventure!
            </p>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Free Car
              Parking
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Natural
              Environment
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Professional
              Guide & Security
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>World Best
              Animals
            </h5>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="img/about.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div
      class="container-xxl bg-primary facts my-5 py-5 wow fadeInUp"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-4">
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.1s"
          >
            <i class="fa fa-paw fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12345</h1>
            <p class="text-white mb-0">Total Animal</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.3s"
          >
            <i class="fa fa-users fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12345</h1>
            <p class="text-white mb-0">Daily Vigitors</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.5s"
          >
            <i class="fa fa-certificate fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12345</h1>
            <p class="text-white mb-0">Total Membership</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.7s"
          >
            <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12345</h1>
            <p class="text-white mb-0">Save Wild Life</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Facts End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Our Services</p>
            <h1 class="display-5 mb-0">
              Special Services For
              <span class="text-primary">Interstellar Animal Kingdom</span> Visitors
            </h1>
          </div>
          <div class="col-lg-6">
            <div
              class="bg-primary h-100 d-flex align-items-center py-4 px-4 px-sm-5"
            >
              <i class="fa fa-3x fa-mobile-alt text-white"></i>
              <div class="ms-4">
                <p class="text-white mb-0">Call for more info</p>
                <h2 class="text-white mb-0">+91 9481181087</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row gy-5 gx-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid mb-3" src="img/icon/icon-2.png" alt="Icon" />
        <h5 class="mb-3">Car Parking</h5>
        <span>Convenient free car parking available for all visitors. Ample space ensures easy access and a hassle-free visit.</span>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <img class="img-fluid mb-3" src="img/icon/icon-3.png" alt="Icon" />
        <h5 class="mb-3">Animal Photos</h5>
        <span>Capture memorable moments with our diverse animal species. Professional photo opportunities to make your visit unforgettable.</span>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <img class="img-fluid mb-3" src="img/icon/icon-4.png" alt="Icon" />
        <h5 class="mb-3">Guide Services</h5>
        <span>Expert guides offer insightful tours and educational information. Enhance your experience with personalized and engaging narratives.</span>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
        <img class="img-fluid mb-3" src="img/icon/icon-5.png" alt="Icon" />
        <h5 class="mb-3">Food & Beverages</h5>
        <span>Enjoy a variety of delicious food and drink options. Refresh and refuel at our convenient on-site cafes and eateries.</span>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid mb-3" src="img/icon/icon-6.png" alt="Icon" />
        <h5 class="mb-3">Zoo Shopping</h5>
        <span>Visit our gift shops for unique souvenirs and animal-themed merchandise. Find perfect mementos to remember your adventure.</span>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <img class="img-fluid mb-3" src="img/icon/icon-9.png" alt="Icon" />
        <h5 class="mb-3">Rest House</h5>
        <span>Relax and unwind in our comfortable rest house facilities. Ideal for taking breaks and enjoying a peaceful retreat during your visit.</span>
      </div>
    </div>
      </div>
    </div>
    <!-- Service End -->

    <!-- Animal Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="row g-5 mb-5 align-items-end wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Our Animals</p>
            <h1 class="display-5 mb-0">
              Let`s See Our <span class="text-primary">Zoofari</span> Awsome
              Animals
            </h1>
          </div>
          <div class="col-lg-6 text-lg-end">
            <a class="btn btn-primary py-3 px-5" href=""
              >Explore More Animals</a
            >
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-1.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-1.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-2.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-2.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-3.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-3.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                      <h5 class="text-white mb-0">Elephant</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Animal End -->

    <!-- Visiting Hours Start -->
    <div
      class="container-xxl bg-primary visiting-hours my-5 py-5 wow fadeInUp"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
            <h1 class="display-6 text-white mb-5">Visiting Hours</h1>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <span>Monday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Tuesday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Wednesday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Thursday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Friday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Saturday</span>
                <span>9:00AM - 6:00PM</span>
              </li>
              <li class="list-group-item">
                <span>Sunday</span>
                <span>Closed</span>
              </li>
            </ul>
          </div>
          <div class="col-md-6 text-light wow fadeIn" data-wow-delay="0.5s">
            <h1 class="display-6 text-white mb-5">Contact Info</h1>
            <table class="table">
              <tbody>
                <tr>
                  <td>Office</td>
                  <td>42 Nebula Drive Starlight City, Earth Postal Code: 98765</td>
                </tr>
                <tr>
                  <td>Zoo</td>
                  <td>42 Nebula Drive Starlight City, Earth Postal Code: 98765</td>
                </tr>
                <tr>
                  <td>Ticket</td>
                  <td>
                    <p class="mb-2">+91 9481181087</p>
                    <p class="mb-0">ticket@interstellaranimalkingdom</p>
                  </td>
                </tr>
                <tr>
                  <td>Support</td>
                  <td>
                    <p class="mb-2">+91 9481181087</p>
                    <p class="mb-0">support@interstellaranimalkingdom.com</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Visiting Hours End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <h1
          class="display-5 text-center mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
        >
          Our Clients Say!
        </h1>
        <div
          class="owl-carousel testimonial-carousel wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-1.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>
              "Our visit to Interstellar Animal Kingdom was truly magical.
               The space-themed exhibits and diverse animals made it an unforgettable experience. 
               The guides were knowledgeable, and the kids loved the interactive programs. We can't wait to come back!"
              </p>
              <h5 class="mb-1">Patient Name</h5>
              <span class="fst-italic">Vaishnavi</span>
            </div>
          </div>
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-2.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>
              "Interstellar Animal Kingdom exceeded our expectations! The facilities were clean, and the staff was incredibly friendly.
               The animal encounters were a highlight, and the food options were excellent. A must-visit for families!"

              </p>
              <h5 class="mb-1">Patient Name</h5>
              <span class="fst-italic">Vignesh</span>
            </div>
          </div>
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-3.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>

              "We had an amazing time at Interstellar Animal Kingdom. 
              The unique space theme added a special touch to the traditional zoo experience. 
              The conservation education programs were insightful, and we loved the gift shop. Highly recommended!"
              </p>
              <h5 class="mb-1">Patient Name</h5>
              <span class="fst-italic">Shashi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

<?php

require_once 'include/footer.php';

?>