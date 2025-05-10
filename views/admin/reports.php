<?php
require_once '../../controllers/ReportController.php';
require_once '../../controllers/AuthController.php';

// Redirect if not admin
if (!AuthController::isAdmin()) {
    header('location: ../auth/login.php');
    exit;
}

// Handle dismiss action
if (isset($_POST['dismiss']) && isset($_POST['report_id'])) {
    $reportId = $_POST['report_id'];
    ReportController::dismissReport($reportId);
    // Redirect to refresh the page
    header('location: reports.php');
    exit;
}

// Get all active reports
$reports = ReportController::getReports();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Admin Reports</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />
  
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

      <!-- Reports List Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">User Reports</h6>
          </div>
          
          <?php if (empty($reports)): ?>
            <div class="alert alert-info" role="alert">
              No active reports to display.
            </div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                  <tr class="text-white">
                    <th scope="col">Report ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Article ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reports as $report): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($report['id']); ?></td>
                      <td><?php echo htmlspecialchars($report['userId']); ?></td>
                      <td>
                        <a href="../../views/Shared/article.php?id=<?php echo htmlspecialchars($report['articleId']); ?>" class="text-primary">
                          <?php echo htmlspecialchars($report['articleId']); ?>
                        </a>
                      </td>
                      <td><?php echo htmlspecialchars($report['reportDate']); ?></td>
                      <td><?php echo htmlspecialchars($report['reportReason']); ?></td>
                      <td><?php echo htmlspecialchars($report['reportComment']); ?></td>
                      <td>
                        <form method="post" action="reports.php">
                          <input type="hidden" name="report_id" value="<?php echo htmlspecialchars($report['id']); ?>">
                          <button type="submit" name="dismiss" class="btn btn-sm btn-primary">Dismiss</button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Reports List End -->

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