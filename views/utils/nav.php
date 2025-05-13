 <?php   
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  if(isset($_POST['search'])){
    $_SESSION['search']=$_POST['search'];
    SearchController::save($_SESSION['search'], $_SESSION['userId']);
  }
       
  if(session_status() === PHP_SESSION_NONE)
    session_start();

  if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
  }
?>
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
  <a href="#" class="sidebar-toggler flex-shrink-0">
    <i class="fa fa-bars"></i>
  </a>

  <form class="d-none d-md-flex ms-4" method="post" action="../Shared/search.php">
    <input
      class="form-control bg-dark border-0"
      type="search"
      placeholder="Search"
      name="search"
    />
  </form>

  <div class="navbar-nav align-items-center ms-auto">
     <?php 
    if(isset($_SESSION['userId'])) 
    {if($_SESSION['roleId']==2)
      {

      
    ?>
      <a href="../Shared/addArticle.php"><button type="button" class="btn btn-light m-2">Add Article</button></a>
    <?php
    }
    ?>
    <?php 
    if(isset($_SESSION['username'])) {
    ?>
      <a href="../Shared/customizefeed.php"><button type="button" class="btn btn-light m-2">Customize Feed</button></a>
    <?php
    }}
    ?>

    <?php
    if(isset($_SESSION['username'])) {
    ?>
    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <?php if(isset($_SESSION['profilePicture'])) : ?>
          <img
            class="rounded-circle"
            src="<?php echo $_SESSION['profilePicture']?>"
            alt="User"
            style="width: 40px; height: 40px"
          />
          <?php else: ?>
            <img
              class="rounded-circle"
              src="../../views/assets/img/profilePics/blank-profile-pic.png"
              alt="User"
              style="width: 40px; height: 40px"
            />
          <?php endif?>
        <span class="d-none d-lg-inline-flex text-main"><?php echo $_SESSION['username']?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
        <a href="../../views/Shared/profile.php?id=<?php echo htmlspecialchars($userId); ?>" class="dropdown-item text-main">
          My Profile
        </a>

        <?php 
        if($_SESSION['roleId'] == 1)
        {
        ?>
        <a href="../../views/admin/userManagement.php" class="dropdown-item text-main">
          Manage Users <i class="fa fa-user-edit"></i>
        </a>
        <a href="../../views/admin/reports.php" class="dropdown-item text-main">
          Reports <i class="fa fa-flag"></i>
        </a>
        <a href="../../views/admin/generate_report.php" target="_blank" class="dropdown-item text-main">
          Generate Report
        </a>
        <?php
        }
        ?>
        <a href="../../controllers/logout.php" class="dropdown-item text-main">
          Log Out
        </a>
      </div>
    </div>
    <?php
    }
    else {
    ?>
      <a href="../auth/register.php" class="btn btn-outline-primary m-2">
        Register
      </a>
      <a href="../auth/login.php" class="btn btn-primary m-2">
        Login
      </a>
    <?php
    }
    ?>
  </div>
</nav>