<?php
require_once '../../controllers/ProfileController.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('location: ../../views/Shared/404.php');
    exit;
}

if(session_start() === PHP_SESSION_NONE) 
session_start();

$user = ProfileController::fetchProfileData($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $newPassword = $_POST['newPassword'] ?? null;
    $confirmPassword = $_POST['confirmPassword'] ?? null;

    if ($email && $email !== $user[0]['email']) {
        // update only if email is changed
        ProfileController::updateEmail($email);
    }
    else {
        $_SESSION['errMsg'] = "Email can't be empty";
    }

    if ($newPassword && $confirmPassword) {
        if ($newPassword === $confirmPassword) {
            ProfileController::updatePassword($newPassword);
        } else {
            $_SESSION['errMsg'] = "Password and confirm password don't match";
        }
    }
    else {
        $_SESSION['errMsg'] = "Password can't be empty";
    }

    // go to the same again to prevent "confirm form resubmission"
    header('location: ../../views/Shared/profile.php?id=' . $id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>User Profile - DarkPan</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />
  
  <!-- Link to external CSS stylesheets -->
  <?php require_once '../utils/linkTags.php' ?>
</head>

<body>
<?php if (isset($_SESSION['errMsg'])): ?>
    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3" style="z-index: 9999;" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>
        <?php echo $_SESSION['errMsg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
<?php endif; ?>

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

      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-12">
            <div class="bg-secondary rounded p-4">
              <h3 class="text-primary mb-4">
                <i class="fa fa-user-circle me-2"></i>User Profile
              </h3>
              
              <!-- Profile Picture -->
              <div class="row mb-4">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                  <img src="../assets/img/cat1.jpg" alt="Profile Picture" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 2px solid var(--primary);">
                  <form action="uploadProfilePic.php" method="post" enctype="multipart/form-data" class="mt-3">
                    <div class="d-flex justify-content-center">
                      <input type="file" name="profilePic" class="form-control bg-dark border-0 text-light" style="max-width: 250px;">
                    </div>
                    <button class="btn btn-primary btn-sm mt-2" type="submit">
                      <i class="fa fa-upload me-1"></i> Update Photo
                    </button>
                  </form>
                </div>
                
                <!-- Profile Info -->
                <div class="col-md-8">
                  <form action="profile.php?id=<?=$id?>" method="post">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">Username</label>
                        <input type="text" class="form-control bg-dark border-0 text-light" value="<?= $user[0]['username']?>" disabled>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">Email</label>
                        <input name="email" type="email" class="form-control bg-dark border-0 text-light" value="<?= $user[0]['email']?>" required>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">Role</label>
                        <input type="text" class="form-control bg-dark border-0 text-light" value="<?= $user[0]['roleName']?>" disabled>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">Join Date</label>
                        <input type="text" class="form-control bg-dark border-0 text-light" value="<?= $user[0]['joinDate']?>" disabled>
                      </div>
                    </div>
                    
                    <hr class="bg-dark">
                    <h4 class="text-light mb-3">Change Password</h4>
                    
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">New Password</label>
                        <input name="newPassword" type="password" class="form-control bg-dark border-0 text-light">
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label text-light">Confirm New Password</label>
                        <input name="confirmPassword" type="password" class="form-control bg-dark border-0 text-light">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-save me-2"></i>Update Profile
                    </button>
                  </form>
                </div>
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