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
  <?php require_once '../utils/linkTags.php' ?>
  
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <?php require_once '../utils/spinner.php'?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php'?>
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
    <p class="fs-5 text-secondary">Recent Highlights</p>
    <h2 class="fw-bold">Translate. Write. Teach. <br class="d-none d-md-block"> Because your voice matters</h2>
  </div>

  <!-- Articles Grid -->
  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm">
        <img src="../assets/img/blog-img-03.jpeg" class="card-img-top" alt="Why Language Matters">
        <div class="card-body">
          <p class="text-muted">Informations</p>
          <h5 class="card-title">Why Language Matters in Education</h5>
          <p class="card-text">
            Imagine opening a textbook and not understanding a single word.
            That’s the daily reality for millions of learners around the world.
            In this blog, we explore how language can be the bridge — or the barrier —
            to knowledge, and how multilingual education changes lives.
          </p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm">
        <img src="../assets/img/blog-img-01.jpeg" class="card-img-top" alt="Building an Encyclopedia">
        <div class="card-body">
          <p class="text-muted">Informations</p>
          <h5 class="card-title">Building an Encyclopedia for the World</h5>
          <p class="card-text">
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
      <div class="card h-100 shadow-sm">
        <img src="../assets/img/blog-img-05.jpeg" class="card-img-top" alt="How You Can Help">
        <div class="card-body">
          <p class="text-muted">Informations</p>
          <h5 class="card-title">How You Can Help Us Share Knowledge</h5>
          <p class="card-text">
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
      <div class="card h-100 shadow-sm">
        <img src="../assets/img/blog-img-04.jpeg" class="card-img-top" alt="Power of Community Knowledge">
        <div class="card-body">
          <p class="text-muted">Informations</p>
          <h5 class="card-title">The Power of Community-Curated Knowledge</h5>
          <p class="card-text">
            The internet is full of information — but not all of it is accessible,
            and not all of it is true. Our platform relies on real people
            from real communities to refine articles. This helps truth travel far — and stay accurate.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Refresh Button -->
  <div class="text-center mt-5">
    <button class="btn btn-primary px-4 py-2" onclick="conc();">Refresh</button>
  </div>
</div>

            <!-- <canvas id="myChart" width="400" height="200"></canvas> -->
            <div class="video-container">
                <video autoplay muted loop>
                    <source
                        src="https://organicthemes.com/demo/chrono/wp-content/blogs.dir/115/files/2023/05/pexels-vlada-karpovich-4452751-1920x1080-25fps.mp4"
                        type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <div class="overlay">
                    <!-- <p>Learning</p> -->
                    <p>Access to knowledge shouldn’t depend on where you <br> live or the language you speak.
                        We believe education is <br> a right — and we’re building tools that help make it happen. <br>
                        Explore how language equity is <br>reshaping the future of learning.</p>
                </div>
            </div>


            <?php 
            if(!$rl){
                ?>
                 <div class="div">
                <div class="div222">
                    <div class="div222-1">
                        <p class="p1">Deliver amazing digital <br> experiences.</p>
                        <p class="p2">We’ve helped thousands of companies, just like yours, change their businesses.</p>
                    </div>
                    <div class="div222-2">
                        <button>Talk to us today</button>
                        <button>Sign in</button>
                        <button>Register</button>
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


      <!-- Footer Start -->
      <?php require_once '../utils/footer.php' ?>
      <!-- Footer End -->

    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <!-- JavaScript Libraries and Template JS -->
  <?php require_once '../utils/scripts.php' ?>
</body>
</html>
