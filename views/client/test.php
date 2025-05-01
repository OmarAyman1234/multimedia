<?php
// Dummy array of articles with author information
$articles = [
    [
        'title' => 'Understanding Async/Await in JavaScript',
        'image' => '../assets/img/cat1.jpg',
        'category' => 'JavaScript',
        'author' => 'John Doe',
        'author_image' => '../assets/img/user.jpg'
    ],
    [
        'title' => 'Getting Started with Docker',
        'image' => '../assets/img/cat2.jpg',
        'category' => 'DevOps',
        'author' => 'Jane Smith',
        'author_image' => '../assets/img/user.jpg'
    ],
    [
        'title' => 'Mastering Flexbox in CSS',
        'image' => '../assets/img/cat3.jpg',
        'category' => 'CSS',
        'author' => 'Emily Johnson',
        'author_image' => '../assets/img/user.jpg'
    ],
    // Add more articles if needed
];

shuffle($articles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Article Feed</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Link to external CSS stylesheets -->
  <?php require_once '../utils/linkTags.php' ?>
</head>
<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner -->
    <?php require_once '../utils/spinner.php' ?>

    <!-- Sidebar -->
    <?php require_once '../utils/sidebar.php' ?>

    <!-- Content -->
    <div class="content">
      <!-- Navbar -->
      <?php require_once '../utils/nav.php' ?>

      <div class="container py-5">
        <h1 class="mb-4 text-title text-center">Explore</h1>
        <div class="row g-4">
          <?php foreach ($articles as $article): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card bg-secondary border-0 h-100 shadow-sm">
                <img src="<?php echo $article['image']; ?>" class="card-img-top" alt="Article image" style="height: 180px; object-fit: cover;" />
                <div class="card-body">
                  <span class="badge bg-primary mb-2"><?php echo $article['category']; ?></span>
                  <h5 class="card-title text-title"><?php echo $article['title']; ?></h5>

                  <!-- Author info -->
                  <div class="d-flex align-items-center">
                    <img src="<?php echo $article['author_image']; ?>" class="rounded-circle" alt="Author image" style="width: 30px; height: 30px; object-fit: cover; margin-right: 10px;" />
                    <span class="text-main"><?php echo $article['author']; ?></span>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Footer -->
      <?php require_once '../utils/footer.php' ?>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <!-- JavaScript Libraries and Template JS -->
  <?php require_once '../utils/scripts.php' ?>
</body>
</html>
