<?php
class Alert {

  public static function renderAlert() {
    if (session_status() === PHP_SESSION_NONE)
      session_start();

    if (isset($_SESSION['alert']) && !empty($_SESSION['alert'])) {
      echo '
        <div style="position: fixed; top: 20px; right: 20px; width: 25rem; z-index: 1050;">
          <div class="alert alert-' . htmlspecialchars($_SESSION['alert']['type']) . ' alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> ' . htmlspecialchars($_SESSION['alert']['message']) . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      ';
      unset($_SESSION['alert']);
    }
  }

  public static function setAlert($type, $msg) {
    if (session_status() === PHP_SESSION_NONE)
      session_start();

    $_SESSION['alert'] = [
      "type" => $type,
      "message" => $msg
    ];
  }
}
?>
