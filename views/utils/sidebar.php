<?php   
  if(session_status() === PHP_SESSION_NONE){

    session_start();
  }
  if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
  }
  

?>
<div class="sidebar pe-4 pb-3 overflow-hidden">
  <nav class="navbar bg-secondary navbar-dark">
    <a href="../../views/Shared/index.php" class="navbar-brand mx-4 mb-3">
      <h3 class="text-primary">
        Multimedia
      </h3>
    </a>
    <?php 
      if(isset($_SESSION['username']) && isset($_SESSION['roleName'])) {
        ?>
        <a href="../../views/Shared/profile.php?id=<?=$userId?>" class="d-flex align-items-center ms-4 mb-4">
          <div class="position-relative">
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
          </div>
          <div class="ms-3">
            <h6 class="mb-0 text-title"> <?php echo $_SESSION['username'] ?></h6>
            <span class="text-main"><?php echo $_SESSION['roleName'] ?></span>
          </div>
        </a>   

        <div class="navbar-nav w-100">
          <a href="../../views/Shared/searchHistory.php?id=<?php echo htmlspecialchars($userId); ?>" class="nav-item nav-link text-main">
            <i class="fa fa-history me-2"></i>Search History
          </a>
          <a href="../../views/client/lists.php?id=<?php echo htmlspecialchars($userId); ?>" class="nav-item nav-link text-main">
            <i class="fa fa-list me-2"></i>Lists
          </a>
          <a href="../Shared/randomArticle.php?random=1" id="randomArticleBtn" class="nav-item nav-link text-main">
            <i class="fa fa-random me-2"></i>Random Article</a>

        </div>
      <?php
      }
      ?>

  </nav>
</div>
