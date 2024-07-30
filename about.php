<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>

    <!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="home.php">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Pages</a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page">
              About Us
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">

          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="img/carousel-1.jpg" alt="" />
            </div>
          </div>

          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-6 mb-4">About Interstellar Animal Kingdom Biological Park</h1>
            <p>Interstellar Animal Kingdom is an innovative Eco-Education and Tourism Development Project managed by the Galaxy Administration in the magnificent Star City, Space State, Andromeda Galaxy.</p>
            <p>Interstellar Animal Kingdom is an integrated theme park with diverse features; it boasts numerous attractions of cultural and scientific significance. The park spans over 500 acres along the serene banks of the Milky Way river.</p>
            <p>The Interstellar Animal Kingdom Biological Park is one of the primary attractions of the kingdom. Encompassing an area of 200 acres, the park is recognized as a premier zoo by the Galactic Zoo Authority. In line with modern zoological practices, the animals are housed in spacious enclosures that closely mimic their natural habitats.</p>
            <p>The park is equipped with a state-of-the-art veterinary hospital complex featuring quarantine facilities, post-treatment wards, a post-mortem block, and advanced diagnostic equipment such as X-ray and ultrasound scanners. The Galactic Zoo Authority funded the construction of this hospital complex.</p>
            <p>Interstellar Animal Kingdom Biological Park is aesthetically one of the most beautifully designed facilities in the galaxy, adhering to all modern international standards of zoo management. The park serves as an excellent educational center for students of all ages, enhancing their knowledge about wildlife conservation.</p>
            <p>The zoo is home to approximately 1500 animals from 150 species of mammals, reptiles, and birds. The park prides itself on breeding several endangered species native to the Andromeda region. It is the only zoo in the galaxy to successfully breed the Andromedan Dragon in captivity.</p>
            <p>The park's area is covered with dense vegetation, providing a natural habitat for wild animals. Numerous free-ranging mammals, reptiles, amphibians, and insects inhabit the zoo premises, which also serve as a nesting ground for over 100 species of birds.</p>
          </div>


        </div>
      </div>
    </div>
    <!-- About End -->


        <!-- Administration Start -->
        <div class="container-xxl py-5">
      <div class="container">
        <h2 class="display-6 mb-4">Administration</h2>
        <h3>Advisory Committee of Interstellar Animal Kingdom Biological Park</h3>
        <ul>
          <li><strong>President:</strong> Mr. Orion Starfield, Director, Interstellar Animal Kingdom Biological Park</li>
          <li><strong>Members:</strong>
            <ul>
              <li>Mr. Vega Lightyear, Commissioner, Interstellar Development Authority</li>
              <li>Mr. Aldebaran Bright, M/s Bright Constructions, Star City</li>
              <li>Ms. Nova Shine, M/s Shine Agencies, Star City</li>
              <li>Assistant Conservator of Forests, Star Division, Star City</li>
              <li>Mr. Celestial Guardian, Animal Care Trust, Star City</li>
            </ul>
          </li>
        </ul>
        <h3>Technical Staff of Interstellar Animal Kingdom Biological Park</h3>
        <ul>
          <li>Mr. Nebula Spark, Assistant Engineer</li>
          <li>Ms. Galaxy Bhandary, Wildlife Biologist</li>
          <li>Dr. Luna Healing, Veterinary Officer</li>
          <li>Mr. Meteor Prasad, Zoologist</li>
        </ul>
      </div>
    </div>
    <!-- Administration End -->

    
<?php

require_once 'include/footer.php';

?>