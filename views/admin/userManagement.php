<?php
require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';

$users = UserController::getAllUsers();

if(isset($_POST['delUser'])) {
  UserController::deleteUser($_POST['delUser']);
}

if(isset($_POST['userIdToEditRole'], $_POST['newRoleId'])) {
  UserController::updateUserRole($_POST['userIdToEditRole'], $_POST['newRoleId']);
}
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
        <h1 class="text-title mb-4">User Management (<?=count($users)?> users)</h1>

      <div class="table-responsive rounded shadow-sm border border-secondary">
        <table class="table table-dark table-hover align-middle mb-0">
          <thead class="thead-light text-uppercase big">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $index => $user): ?>
              <tr class="border-top border-secondary">
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['roleName']; ?></td>
                <td class="d-flex align-items-center gap-2">
                  <!-- Delete Form -->
                  <form action="userManagement.php" method="POST">
                    <input type="hidden" name="delUser" value="<?= $user['id'] ?>">
                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                  </form>

                  <!-- Update Role Form -->
                  <form method="POST" action="userManagement.php" class="d-flex flex-column align-items-start">
                    <input type="hidden" name="userIdToEditRole" value="<?= $user['id'] ?>">
                    <select name="newRoleId" class="form-select form-select-sm bg-dark text-white border-light w-auto" required>
                      <option value="1" <?= $user['roleName'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
                      <option value="2" <?= $user['roleName'] === 'Editor' ? 'selected' : '' ?>>Editor</option>
                      <option value="3" <?= $user['roleName'] === 'Client' ? 'selected' : '' ?>>Client</option>
                    </select>
                    <button type="submit" name="updateSpecificUserRole" class="btn btn-outline-success btn-sm mt-1">Update</button>
                  </form>
                </td>
              </tr>
              <tr><td colspan="5"><hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;"></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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