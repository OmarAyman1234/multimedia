<?php
session_start();

require_once "../../controllers/AuthController.php";
require_once "../../models/client.php";
require_once "../../controllers/DBController.php";


// echo $_SESSION["userId"];
$rl=0;
if(isset($_SESSION["userId"])){
    $rl= $_SESSION["userId"];

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap & Template Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
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
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    
            </nav>
            <!-- Navbar End -->
             <div class="dicc">
                <div class="divaa">
                
            </div>
             </div>
            
            <div class="div0">
                <div class="div1">
                    <p>If you want to go <br> fast, go alone. If you <br>want to go far, go together.</p>
                </div>
                <div class="div2">
                    <p>Knowledge is power, but only when it’s shared.”<br>
                        This quote has guided many great minds. <br> But what if that power—the power <br>of knowledge—was
                        locked away <br> behind language barriers?</p>
                    <a href="#">>Discover our Community</a>
                </div>
            </div>
            <div class="div22">
                <input type="text" name="" id="" placeholder="Search in any languague:">
                <button>Search</button>
            </div>

            <!-- Sale & Revenue Start -->
            <div class="div41">
                <div class="div4-1">
                    <div class="div4-1-1">
                        <p class="par5">Recent Highlights</p>
                        <p class="par6">Translate. Write. Teach. Because <br> your voice matters</p>
                    </div>
        
                </div>
                <div class="div4-2">
                    <div class="div4-2-1" id="div1">
                        <img src="../assets/img/blog-img-03.jpeg" alt="">
                        <p class="par7">Informations</p>
                        <p class="par8">Why Language Matters <br> in Education </p>
                        <p class="par9">
                            Imagine opening a textbook and not understanding a single word. <br>
                            That’s the daily reality for millions of learners around the world. <br>
                            In this blog, we explore how language can be the bridge — <br>
                            or the barrier — to knowledge, and how multilingual <br>
                            education changes lives.
                        </p>
                        
                    </div>
                    <div class="div4-2-1" id="div2">
                        <img src="../assets/img/blog-img-01.jpeg" alt="">
                        <p class="par7">Informations</p>
                        <p class="par8">Building an Encyclopedia <br> for the World </p>
                        <p class="par9">
                            What if every child, in every country, could access trusted <br>
                            information in their native language? That’s not just a dream — <br>
                            it’s our mission. In this post, we walk you through how our <br>
                            multilingual encyclopedia is changing the way the world <br>
                            learns.
                        </p>
                        
                    </div>
                </div>
                <div class="div4-3">
                    <div class="div4-2-1" id="div4-2-1">
                        <img src="../assets/img/blog-img-05.jpeg" alt="" id="i1">
                        <p class="par7">Informations</p>
                        <p class="par8">How You Can Help <br> Us Share Knowledge </p>
                        <p class="par9">
                            You don’t need a PhD to make a difference. <br>
                            Whether you speak Swahili, Hindi, French, or Filipino — <br>
                            your words have power. Learn how you can contribute, <br>
                            translate, or edit articles and join a growing <br>
                            global community of knowledge sharers.
                        </p>
                        
                    </div>
                    <div class="div4-2-1" id="div3">
                        <img src="../assets/img/blog-img-04.jpeg" alt="">
                        <p class="par7">Informations</p>
                        <p class="par8">The Power of Community<br>-Curated Knowledge</p>
                        <p class="par9">
                            The internet is full of information — but not all of it is accessible, <br>
                            and not all of it is true. Our platform relies on real people <br>
                            from real communities to review and refine articles. <br>
                            This is how we ensure truth travels far — <br>
                            and stays accurate.
                        </p>
                        
                    </div>
                </div>
                <div class="buttondiv">
                    <button class="but1" onclick="conc();"> Refresh</button>
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

            
             
            <div class="section10">
                <p class="par11"> <span class="span17"><b>Organic Block</b> Example</span> <br>
                    <span class="span18"><b>News From The Blog</b></span> <br>
                    <span class="span19">This section features an example of the Posts Block, available within the Organic Blocks plugin. It showcases a group of <br> posts from a selected post type in a blog style layout. Create customizable, multi-column blog layouts with ease.</span></p>
                    <div class="div101">
                        <div class="section10-1">
                         <img src="../assets/img/post-01.jpg" alt="">
                         <div class="section10-1-1">
                            <div class="section10-1-1-1">
                               <button>Blog</button>
                               <button>Featured</button>
                            </div>
                             <p><span class="span20">How To Sell Services As Products Online </span> <br>
                                <span class="span21">posted on February 12, 2020</span></p>
                                <button class="button4">Read More</button>
                        </div>
                        </div>
                        <div class="section10-2">
                            <img src="../assets/img/post-02.jpg" alt="">
                            <div class="section2-1-1">
                                <div class="section10-2-1-1">
                                <button>Blog</button>
                                <button>Featured</button>
                            </div>
                            <p> <span class="span20">Our New Office Downtown</span> <br>
                                <span class="span21">posted on February 7, 2020</span></p>
                                <button class="button5">Read More</button>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="div202">
                        <div class="section10-2">
                            <img src="../assets/img/post-03.jpg" alt="">
                            <div class="section2-1-1">
                                <div class="section10-2-1-1">
                                    <button>Blog</button>
                                    <button>Featured</button>
                                </div>
                                <p> <span class="span20">Refreshing Our Brand</span> <br>
                                    <span class="span21">posted on February 6, 2020</span>
                                </p>
                                <button class="button5">Read More</button>
                            </div>
                    
                        </div>
                        <div class="section10-2">
                            <img src="../assets/img/post-04.jpg" alt="">
                            <div class="section2-1-1">
                                <div class="section10-2-1-1">
                                    <button>Blog</button>
                                    <button>Featured</button>
                                </div>
                                <p> <span class="span20">Agency Launches A New VR Experience</span> <br>
                                    <span class="span21">posted on February 7, 2020</span>
                                </p>
                                <button class="button5">Read More</button>
                            </div>
                    
                        </div>
                    </div>
                </div>

            

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="about">
                    <div class="links3">
                        <p><b>Organic Themes</b></p>
                        <a href="#">About Us</a><br>
                        <a href="#">Contact</a><br>
                        <a href="#">Products</a><br>
                        <a href="#">Services</a><br>
                        <a href="#">News</a><br>
                    </div>
                    <div class="informations">
                        <p><b>Our Mission</b></p>
                        <p>Organic Themes humanizes products, brands, and processes. We take the <br> complicated, and make it
                            simple and accessible. Ultimately, our goal is to <br> provide tools to empower people to build
                            online business and free <br> themselves from the chains of the corporate world.</p>
                        <button>Read Our Story</button>
                    </div>
                </div>
                
        
                <div class="social">
                    <div class="div3"><img src="../assets/img/icons8-facebook-logo-50.png" alt="" class="img4"></div>
                    <div class="div4"><img src="../assets/img/icons8-instagram-50.png" alt=""></div>
                    <div class="div5"><img src="../assets/img/icons8-snapchat-50.png" alt=""></div>
                    <div class="div6"><img src="../assets/img/icons8-youtube-50.png" alt=""></div>
                </div>
            </div>
            <!-- Footer End -->
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="../assets/js/index.js"></script>
    <?php require_once '../utils/scripts.php' ?>
    


</body>

</html>