<?php   
  if(session_status() === PHP_SESSION_NONE){

    session_start();
  }
  $id = $_SESSION['userId'];
?>
<div class="sidebar pe-4 pb-3 overflow-hidden">
  <nav class="navbar bg-secondary navbar-dark">
    <a href="index.php" class="navbar-brand mx-4 mb-3">
      <h3 class="text-primary">
        Multimedia
      </h3>
    </a>
    <?php 
      if(isset($_SESSION['username']) && isset($_SESSION['roleName'])) {
        ?>
        <div class="d-flex align-items-center ms-4 mb-4">
          <div class="position-relative">
            <img
              class="rounded-circle"
              src="../assets/img/user.jpg"
              alt="User"
              style="width: 40px; height: 40px"
            />
          </div>
          <div class="ms-3">
            <h6 class="mb-0 text-title"> <?php echo $_SESSION['username'] ?></h6>
            <span class="text-main"><?php echo $_SESSION['roleName'] ?></span>
          </div>
        </div>   

        <div class="navbar-nav w-100">
          <?php 
          if(isset($_SESSION['roleId']) && $_SESSION['roleId'] == 1) {
          ?>
            <a href="index.php" class="nav-item nav-link text-main">
              <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
          <?php
            }
          ?>
          <a href="../client/lists.php?id=<?php echo htmlspecialchars($id); ?>" class="nav-item nav-link text-main">
            <i class="fa fa-list me-2"></i>Lists
          </a>
          <div class="nav-item dropdown">
            <a
              href="index.php"
              class="nav-link dropdown-toggle text-main"
              data-bs-toggle="dropdown"
            >
              <i class="fa fa-laptop me-2"></i>Elements
            </a>
            <div class="dropdown-menu over bg-transparent border-0">
              <a href="../../z_useful-elements/button.html" class="dropdown-item text-main">
                Buttons
              </a>
              <a
                href="../../z_useful-elements/typography.html"
                class="dropdown-item text-main"
              >
                Typography
              </a>
              <a href="../../z_useful-elements/element.html" class="dropdown-item text-main">
                Other Elements
              </a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

  </nav>
</div>
