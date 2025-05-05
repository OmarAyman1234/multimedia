<!-- <?php   
  if(session_status() === PHP_SESSION_NONE)
    session_start()
?> -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
  <a href="#" class="sidebar-toggler flex-shrink-0">
    <i class="fa fa-bars"></i>
  </a>

  <form class="d-none d-md-flex ms-4">
    <input
      class="form-control bg-dark border-0"
      type="search"
      placeholder="Search"
    />
  </form>

  <div class="navbar-nav align-items-center ms-auto">
    
    <?php 
    if(isset($_SESSION['username'])) {
    ?>
      <button type="button" class="btn btn-light m-2">Customize Feed</button>
    <?php
    }
    ?>

    <?php
    if(isset($_SESSION['username'])) {
    ?>
    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <img
          class="rounded-circle me-lg-2"
          src="../assets/img/user.jpg"
          alt="User"
          style="width: 40px; height: 40px"
        />
        <span class="d-none d-lg-inline-flex text-main"><?php echo $_SESSION['username']?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
        <a href="#" class="dropdown-item text-main">
          My Profile
        </a>

        <?php 
        if($_SESSION['roleId'] == 1)
        {
        ?>
        <a href="#" class="dropdown-item text-main">
          Manage Users <i class="fa fa-user-edit"></i>
        </a>
        <a href="#" class="dropdown-item text-main">
          Reports <i class="fa fa-flag"></i>
        </a>
        <a href="#" class="dropdown-item text-main">
          Generate Report
        </a>
        <?php
        }
        ?>
        <a href="#" class="dropdown-item text-main">
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