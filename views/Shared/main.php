<?php
session_start();


require_once "../../controllers/AuthController.php";
require_once "../../models/client.php";
require_once "../../controllers/DBController.php";
$rl=0;
if(isset($_SESSION["userId"])){
    $rl= $_SESSION["userId"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Article page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />
  <link rel="stylesheet" href="">
  <!-- Link to external CSS stylesheets -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <?php require_once '../utils/linkTags.php' ?>
  <style>
.row .card {
  display: flex;
  flex-direction: column;
  height: 100%;
}
.row .card-img-top {
  height: 300px;
  object-fit: cover;
}
.row .card-body {
  flex: 1;
  display: flex;
  flex-direction: column;
}
.row .card-body .card-title {
  margin-bottom: auto;
}
  </style>
</head>
<body>


  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <?php require_once '../utils/spinner.php'?>
    <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
          <?php require_once '../utils/sidebar.php'?>
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <!-- <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div> -->
                </div>
                <div class="navbar-nav w-100">
                <?php if($rl){
                ?>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Client</span>
                    </div>
                </div>
                <?php
             } ?>
                    <!-- <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->
                    <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                     
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>-->
                    <?php if(!$rl){ ?>
                        <a href="../auth/login.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Register</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Sign in</a><?php
                    } ?>
                     <?php if($rl){ ?>
                        <a href="../auth/login.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Articles</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Lists</a><?php
                    } ?>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            

                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div> -->
            </nav>
        </div>
        <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php'?>
      <!-- Navbar End -->
            <!-- Sale & Revenue Start -->
            <div class="container py-4">
  <!-- Header -->
  <div class="text-center mb-5">
    <p class="fs-5 text-secondary" style="color:rgb(19, 109, 255);">Recent Highlights</p>
    <h2 class="fw-bold">Translate. Write. Teach. <br class="d-none d-md-block"> Because your voice matters</h2>
  </div>
  <!-- Articles Grid -->
  
  <div class="row g-4">
  <!-- Card 1 -->
  <div  class="col-12 col-md-6">
    <div class="div4-2-1" class="card h-100 shadow-sm" id="div1">
      <img id="img1" src="../assets/img/blog-img-03.jpeg" class="card-img-top" alt="Why Language Matters">
      <div id="card1" class="card-body">
      <p class="text-muted" id="info1">Informations</p>
        <h5 class="card-title" id="title1">Why Language Matters in Education</h5>
        <p class="card-text" id="text1">Imagine opening a textbook and not understanding a single word.
          That’s the daily reality for millions of learners around the world.
          In this blog, we explore how language can be the bridge — or the barrier —
          to knowledge, and how multilingual education changes lives.</p>
        <!-- <p class="text-muted" ></p>
        <h5 class="card-title"></h5>
        <p class="card-text"> -->
          
        </p>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="col-12 col-md-6">
    <div class="div4-2-1" class="card h-100 shadow-sm" id="div2">
      <img id="img2" src="../assets/img/blog-img-01.jpeg" class="card-img-top" alt="Building an Encyclopedia">
      <div id="card2" class="card-body">
        <p class="text-muted" id="info2">Informations</p>
        <h5 class="card-title" id="title2">Building an Encyclopedia for the World</h5>
        <p class="card-text" id="text2">
          What if every child, in every country, could access trusted
          information in their native language? That’s not just a dream —
          it’s our mission. This post shows how our multilingual encyclopedia
          is changing the way the world learns.
        </p>
      </div>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="col-12 col-md-6">
    <div class="div4-2-1" class="card h-100 shadow-sm" id="div4-2-1">
      <img id="img3" src="../assets/img/blog-img-05.jpeg" class="card-img-top" alt="How You Can Help">
      <div id="card3" class="card-body">
        <p class="text-muted" id="info3">Informations</p>
        <h5 class="card-title" id="title3">How You Can Help Us Share Knowledge</h5>
        <p class="card-text" id="text3">
          You don’t need a PhD to make a difference.
          Whether you speak Swahili, Hindi, French, or Filipino —
          your words have power. Learn how you can contribute, translate,
          or edit articles and join a growing global knowledge community.
        </p>
      </div>
    </div>
  </div>

  <!-- Card 4 -->
  <div class="col-12 col-md-6">
    <div class="div4-2-1" class="card h-100 shadow-sm" id="div3">
      <img id="img4" src="../assets/img/blog-img-04.jpeg" class="card-img-top" alt="Power of Community Knowledge">
      <div id="card4" class="card-body">
        <p class="text-muted" id="info4">Informations</p>
        <h5 class="card-title" id="title4">The Power of Community-Curated Knowledge</h5>
        <p class="card-text" id="text4">
          The internet is full of information — but not all of it is accessible,
          and not all of it is true. Our platform relies on real people
          from real communities to refine articles. This helps truth travel far — and stay accurate.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="text-center mt-5 refresh-btn">
    <button class="btn btn-primary px-4 py-2" onclick="shuffleAndUpdate();">Refresh</button>
  </div>
<!-- Refresh Button -->
 
 
</div>
            <div class="section-wrapper">
    <!-- Video Section -->
    <div class="section video-section">
        <div class="video-container">
            <video autoplay muted loop>
                <source
                    src="https://organicthemes.com/demo/chrono/wp-content/blogs.dir/115/files/2023/05/pexels-vlada-karpovich-4452751-1920x1080-25fps.mp4"
                    type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="overlay">
                <p>Access to knowledge shouldn’t depend on where you <br> live or the language you speak.
                    We believe education is <br> a right — and we’re building tools that help make it happen. <br>
                    Explore how language equity is <br> reshaping the future of learning.</p>
            </div>
        </div>
    </div>
</div>
<style>
    /* Main Wrapper for all sections */
    
</style>
<?php 
if(!$rl){
    ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card shadow-sm text-center mx-auto" style="max-width: 400px;">
                    <div class="card-body">
                        <p class="text-muted fs-5 mb-2">Deliver amazing digital <br> experiences.</p>
                        <p class="card-text mb-4">We’ve helped thousands of companies, just like yours, change their businesses.</p>
                        <div class="d-flex flex-column gap-2">
                            <button class="btn btn-primary">Talk to us today</button>
                            <button class="btn btn-secondary">Sign in</button>
                            <button class="btn btn-success">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


<div class="container my-5 section10">
  <!-- Section Header -->
  <div class="text-center mb-5">
    <div>
      <p class="h5 mb-1"><strong>Organic Block</strong> Example</p>
      <h2 class="fw-bold mb-3">News From The Blog</h2>
      <p class="text-muted mx-auto" style="max-width: 700px;">
        Discover a curated collection of posts using the Organic Blocks plugin. Create customizable, multi-column blog layouts effortlessly with this versatile feature.
      </p>
    </div>
  </div>
  <!-- Blog Posts Grid -->
  <div class="row g-4">
    <!-- Blog Post Template -->
    <!-- Repeat for each post -->
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm border-0 transition-ease">
        <img src="../assets/img/post-01.jpg" class="card-img-top" alt="How To Sell Services As Products Online">
        <div class="card-body">
          <div class="mb-2">
            <span class="badge bg-primary me-2">Blog</span>
            <span class="badge bg-secondary">Featured</span>
          </div>
          <h5 class="card-title">How To Sell Services As Products Online</h5>
          <p class="text-muted small">Posted on February 12, 2020</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
    <!-- Repeat other posts -->
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm border-0 transition-ease">
        <img src="../assets/img/post-02.jpg" class="card-img-top" alt="Our New Office Downtown">
        <div class="card-body">
          <div class="mb-2">
            <span class="badge bg-primary me-2">Blog</span>
            <span class="badge bg-secondary">Featured</span>
          </div>
          <h5 class="card-title">Our New Office Downtown</h5>
          <p class="text-muted small">Posted on February 7, 2020</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm border-0 transition-ease">
        <img src="../assets/img/post-03.jpg" class="card-img-top" alt="Refreshing Our Brand">
        <div class="card-body">
          <div class="mb-2">
            <span class="badge bg-primary me-2">Blog</span>
            <span class="badge bg-secondary">Featured</span>
          </div>
          <h5 class="card-title">Refreshing Our Brand</h5>
          <p class="text-muted small">Posted on February 6, 2020</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm border-0 transition-ease">
        <img src="../assets/img/post-04.jpg" class="card-img-top" alt="Agency Launches A New VR Experience">
        <div class="card-body">
          <div class="mb-2">
            <span class="badge bg-primary me-2">Blog</span>
            <span class="badge bg-secondary">Featured</span>
          </div>
          <h5 class="card-title">Agency Launches A New VR Experience</h5>
          <p class="text-muted small">Posted on February 7, 2020</p>
          <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>

            <?php require_once '../utils/footer.php' ?>
            <!-- Footer End -->
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <!-- <script src="../assets/js/index.js"></script> -->
    <div class="row g-4" id="articles-container">
  <!-- Cards will be dynamically inserted here -->
</div>

<!-- Refresh Button -->
<script src="../assets/js/index.js"></script>

    <?php require_once '../utils/scripts.php' ?>
</body>
</html>