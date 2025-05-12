<?php
require_once '../../controllers/ProfileController.php';
require_once '../../views/utils/alert.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('location: ../../views/Shared/404.php');
    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = ProfileController::fetchProfileData($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateProfile'])) {
        $email = $_POST['email'] ?? null;
        $newPassword = $_POST['newPassword'] ?? null;
        $confirmPassword = $_POST['confirmPassword'] ?? null;

        if ($email && $email !== $user[0]['email']) {
            ProfileController::updateEmail($email);
        } else {
            Alert::setAlert('danger', 'Email cannot be empty or unchanged');
        }

        if ($newPassword || $confirmPassword) {
            if ($newPassword === $confirmPassword) {
                ProfileController::updatePassword($newPassword);
            } else {
                Alert::setAlert('warning', "Password and confirm password do not match");
                header("location: profile.php?id=" . $_SESSION['userId']);
                exit;
            }
        }
    }

    if (isset($_POST['updatePhoto']) && isset($_FILES['profilePic'])) {
        $targetDir = "../assets/img/";
        $targetFile = $targetDir . basename($_FILES["profilePic"]["name"]);
        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
            ProfileController::updateProfilePicture($targetFile);
        } else {
            Alert::setAlert('danger', 'Error uploading file');
            header("location: profile.php?id=$id");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>User Profile</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <link href="img/favicon.ico" rel="icon" />
  <?php require_once '../utils/linkTags.php' ?>
</head>

<body>
  <?php Alert::renderAlert() ?>

  <div class="container-fluid position-relative d-flex p-0">
    <?php require_once '../utils/spinner.php'?>
    <?php require_once '../utils/sidebar.php'?>

    <div class="content">
      <?php require_once '../utils/nav.php'?>

      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-12">
            <div class="bg-secondary rounded p-4">
              <h3 class="text-primary mb-4">
                <i class="fa fa-user-circle me-2"></i>User Profile
              </h3>
              
              <div class="row mb-4">
                <!-- Profile Picture -->
                <div class="col-md-4 text-center mb-3 mb-md-0">
                  <img src="<?php echo $user[0]['profilePicture']; ?>" alt="Profile Picture" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 2px solid var(--primary);">
                  <form action="profile.php?id=<?= $id ?>" method="post" enctype="multipart/form-data" class="mt-3">
                    <div class="d-flex justify-content-center">
                      <input type="file" name="profilePic" class="form-control bg-dark border-0 text-light" style="max-width: 250px;">
                    </div>
                    <button name="updatePhoto" class="btn btn-primary btn-sm mt-2" type="submit">
                      <i class="fa fa-upload me-1"></i> Update Photo
                    </button>
                  </form>
                </div>

                <!-- Profile Info -->
                <div class="col-md-8">
                  <form action="profile.php?id=<?= $id ?>" method="post">
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

                    <button name="updateProfile" type="submit" class="btn btn-primary">
                      <i class="fa fa-save me-2"></i>Update Profile
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <?php require_once '../utils/footer.php' ?>
    </div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <?php require_once '../utils/scripts.php' ?>
</body>
</html>
