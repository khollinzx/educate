<?php
$pagetitle = "Computer Department Portal  &mdash; Website by Colorlib";

require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/indexheader.php');

?>

    <h1 class="text-center"> welcome to Computer Department</h1>
      <div class="compdept-section" id="instruction-section">
        <div class="container">
        </br>
         </br>
          <div class="row mb-5 align-items-center">
            <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
              <img src="images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="200">

              <ul>
                <p class="row mb-2 justify-content-center"  data-aos="fade-up" data-aos-delay="200">
                  <h3 class=" mb-4"> Specific Objectives of the Program includes:</h3></br>
                 A product of this programme should be able to:
                 <li> Install and manage a computer system.</br></li>
                 <li> Design and run efficient programmes in a wide spectrum of fields, and in various languages.</br></li>
                 <li> Advise on the installation and management facilities.</br></li>
                <li>  Troubleshoot and debug computer fault and progrm errors.</li>
                <li>  Carry out routine (preventive, corrective and adaptive) maintenance of computer facilities.</li>
                </p>
          </ul>

            </div>

          </div>

           </br>
    </div>
<?php

include(ROOT_PATH . 'inc/indexfooter.php');
?>