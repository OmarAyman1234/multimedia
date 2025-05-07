<?php
require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';

// Ensure only admins can access this page
if (!AuthController::isAdmin()) {
    header('Location: ../auth/login.php');
    exit;
}

// Fetch all users except the logged-in admin
$users = array_filter(Admin::getAllUsers(), function ($user) {
    return $user['id'] != $_SESSION['userId'];
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>User Management</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <link href="img/favicon.ico" rel="icon" />
  <?php require_once '../utils/linkTags.php'; ?>
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php'; ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php'; ?>
      <!-- Navbar End -->

      <!-- User Management Section -->
      <div class="container-fluid mt-4">
        <h1 class="text-title mb-4">User Management</h1>

        <div class="table-responsive">
          <table class="table table-dark table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?php echo $user['id']; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td><?php echo $user['email']; ?></td>
                  <td><?php echo $user['roleName']; ?></td>
                  <td>
                    <a href="../../controllers/UserController.php?action=deleteUser&deleteRegisteredUserId=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Update Specific User Role Section -->
        <div class="container mt-4">
          <h2>Update Specific User Role</h2>
          <form method="POST" action="../../controllers/UserController.php?action=updateUserRole">
            <div class="mb-3">
              <label for="specificUserId" class="form-label">Select User</label>
              <select class="form-control" id="specificUserId" name="specificUserId" required>
                <?php foreach ($users as $user): ?>
                  <option value="<?php echo $user['id']; ?>">
                    <?php echo $user['username'] . " (" . $user['roleName'] . ")"; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="specificNewRoleId" class="form-label">New Role</label>
              <select class="form-control" id="specificNewRoleId" name="specificNewRoleId" required>
                <option value="1">Admin</option>
                <option value="2">Editor</option>
                <option value="3">Client</option>
              </select>
            </div>
            <button type="submit" name="updateSpecificUserRole" class="btn btn-primary">Update Role</button>
          </form>
        </div>
      </div>

      <!-- Footer Start -->
      <?php require_once '../utils/footer.php'; ?>
      <!-- Footer End -->
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <!-- Scripts -->
  <?php require_once '../utils/scripts.php'; ?>
</body>
</html>