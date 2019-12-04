<?php
$pagetitle = "Yaba-Tech Learning Portal";

require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/indexheader.php');

?>

<div class="site-wrap">

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container-fluid">
      <div class="d-flex align-items-center">
        <img src="<?php echo BASE_URL; ?>assets2/images/yabaimg.png" alt="user">


        <div class="mx-auto text-center pl-4">
          <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mx-4 d-none d-lg-block  m-0 p-0">
              <li><a href="#home-section" class="nav-link">Home</a></li>
              <li><a href="#courses-section" class="nav-link">Departments</a></li>
              <li><a href="#programs-section" class="nav-link">Information</a></li>
              <li><a href="#about-section" class="nav-link">About</a></li>
            </ul>
          </nav>
        </div>

      </div>
    </div>

  </header>

  <div class="intro-section" id="home-section">

    <div class="slide-1" style="background-image: url('<?php echo BASE_URL; ?>assets2/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row align-items-center " style="margin-top: -100px;">
              <div class="col-lg-6 mb-4">
                <h1 data-aos="fade-up" data-aos-delay="100">Learning at one's PACE...</h1>
                <ul>
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="200">This portal is strictly for:</br>
                    <li> Providing e-learning materials for the student in the college.</br></li>
                    <li> Accessing and grading of students on every material.</br></li>
                    <li> Monitoring and tracking of activities of students on the portal.</br></li>
                    <li> Improving e-learning applications in the department for easy maintenance and continuity.</li>
                  </p>
                </ul>

              </div>

              <div class="col-lg-5 ml-auto" data-aos="fade-u" data-aos-delay="500">
                <form id="loginUser" class="form-box">
                  <h3 class="h4 text-black mb-4">Log in</h3>
                  <div class="form-group">
                    <div id="msg">

                    </div>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Email Addresss">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                  </div>

                  <div class="form-group">
                    <button type="submit" id="send" class="btn btn-primary btn-pill"> Login <i clas="fa fa-login"></i> </button>
                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="site-section courses-title " id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">School of Technology</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
      <div class="row">

        <div class="owl-carousel col-12 nonloop-block-14">

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="<?php echo BASE_URL; ?>assets2/images/comp.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="<?php echo BASE_URL; ?>compdept.php">Computer Technology</a></h3>
              <p>One of the fastest growing department in the college and also the leading IT institution in the country with software development. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="<?php echo BASE_URL; ?>course-single.php"><img src="<?php echo BASE_URL; ?>assets2/images/agric2.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="#">Agricultural Technology</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="<?php echo BASE_URL; ?>course-single.php"><img src="<?php echo BASE_URL; ?>assets2/images/food2.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="#">Food Technology</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>



          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="<?php echo BASE_URL; ?>assets2/images/hos.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="#">Hospitality Management</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="<?php echo BASE_URL; ?>assets2/images/tourist.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="#">Leisure & Tourist</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="<?php echo BASE_URL; ?>assets2/images/textile1.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">

              <h3><a href="#">Polymer & Textile Technology</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">

            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-7 text-center">
          <button class="customPrevBtn btn btn-primary m-1">Prev</button>
          <button class="customNextBtn btn btn-primary m-1">Next</button>
        </div>
      </div>
    </div>
  </div>
  </br>
  <div class="container">
    <div class="row">
      <div class="row mb-3 align-items-center">
        <div class="col align-self-start" data-aos="fade-up" data-aos-delay="100">
          <h2 class="text-black mb-7">SCHOOL VISION STATEMENT</h2>
          <p class="mb-4">To be an exceptional school for the delivery of qualitative
            and qualitative manpower for scientific and Technological resources in the country .</p>
        </div>
        <div class="col align-self-end" data-aos="fade-up" data-aos-delay="200">
          <h2 class="text-black mb-7">SCHOOL MISION STATEMENT</h2>
          <p class="mb-4">To produce highly skilled and innovative graduates through effective
            teaching, learning and research for the technological advancement in Nigeria .</p>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section" id="teachers-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Our Teachers</h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam repellat aut neque! Doloribus sunt non aut reiciendis, vel recusandae obcaecati hic dicta repudiandae in quas quibusdam ullam, illum sed veniam!</p>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="teacher text-center">
            <img src="<?php echo BASE_URL; ?>assets2/images/person_1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Benjamin Stone</h3>
              <p class="position">Physics Teacher</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="teacher text-center">
            <img src="<?php echo BASE_URL; ?>assets2/images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Katleen Stone</h3>
              <p class="position">Physics Teacher</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="teacher text-center">
            <img src="<?php echo BASE_URL; ?>assets2/images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Sadie White</h3>
              <p class="position">Physics Teacher</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="site-section" id="about-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay=""></br>
          <img src="<?php echo BASE_URL; ?>assets2/images/favicon.png" alt="Image" class="img-elearning">
          <h2 class="section-title">ABOUT THE DEPARTMENT</h2>
          <h4 class="Subsection-title">BRIEF HISTORY OF THE DEPARTMENT</h4>
          <p class="text-left">The Department of Computer Technology was established in 1989/1990. The Department runs both ND and HND (part-time/full-time) programme in Computer Science.
            The Department offers bureaux services, software development for specific project; we run several courses under the Information Technology service unit, Computer hardware maintenance,
            with an exception record for teaching quality and state of the art facilities and also provides a user friendly and academically challenging environment.</br>
            </br>
            The department has over one hundred and fifty (150) personal computers and other related IT equipments spread over its different laboratories and a central laborayory
            used for servicing other departments in the college. </p>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-image overlay" style="background-image: url('<?php echo BASE_URL; ?>assets2/images/rector4.jpg');">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-10 text-center testimony">

          <img src="<?php echo BASE_URL; ?>assets2/images/rector5.jpg" alt="Image" class="img-fluid w-100 mb-4">
          <h2 class="mb-8">Engr. Obafemi Omokungbe (Rector)</h2></br>
          <blockquote>
            <p>&ldquo; On behalf of the Governing Council, College Management, Staff and Students, it is my pleasure and privilege to welcome you to Yaba College of Technology, the cradle of Higher Education in Nigeria. Established in 1947 as an immediate successor to Yaba Higher College, Yaba College of Technology, YABATECH as it is fondly referred to attained autonomous and independent status in 1969 by virtue of Decree 23 which granted it the exclusive mandate to provide full-time and part-time courses of instruction and training in Technology, Applied Science, Commerce and Management and in such other fields of applied learning relevant to technical, vocational and industrial needs of Nigeria. &rdquo;</p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section pb-0">

    <div class="future-blobs">
      <div class="blob_2">
        <img src="<?php echo BASE_URL; ?>assets2/images/blob_2.svg" alt="Image">
      </div>
      <div class="blob_1">
        <img src="<?php echo BASE_URL; ?>assets2/images/blob_1.svg" alt="Image">
      </div>
    </div>
    <div class="container">
      <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
        <div class="col-lg-7 text-center">
          <h2 class="section-title">Why Choose Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto align-self-start" data-aos="fade-up" data-aos-delay="100">

          <div class="p-4 rounded bg-white why-choose-us-box">

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Yearly Graduates</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Leading Experts in Teaching</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Best Lecturing Techniques</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Expand Your Knowledge</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Best Student Awards</h3>
              </div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Well Equiped Labouratories</h3>
              </div>
            </div>
            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
              <div>
                <h3 class="m-0">Social and Sport Interactions</h3>
              </div>
            </div>
            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
              <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
              <div>
                <h3 class="m-0">Well Conducive Environment</h3>
              </div>
            </div>



          </div>


        </div>
        <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">
          <img src="<?php echo BASE_URL; ?>assets2/images/person_transparent.png" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>





  <div class="site-section bg-light" id="contact-section">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-7">



          <h2 class="section-title mb-3">Message Us</h2>
          <p class="mb-5">For your complaints or challenges on any issue(s) regarding this platform, kindly send us a mail and we will be glad to resolve them within 24hrs. Thanks.</p>

          <form method="post" data-aos="fade">
            <div class="form-group row">
              <div class="col-md-6 mb-3 mb-lg-0">
                <input type="text" class="form-control" placeholder="First name">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Last name">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <textarea class="form-control" id="" cols="30" rows="10" placeholder="Write your message here."></textarea>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">

                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/logging.js"></script>
  <?php

  include(ROOT_PATH . 'inc/indexfooter.php');
  ?>