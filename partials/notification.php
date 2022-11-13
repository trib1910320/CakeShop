<?php
if (isset($_SESSION['notificError'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show mt-5 fs-4 fixed-top start-50 top-0 translate-middle-x " role="alert">
                    <strong>Thông báo!</strong> ' .  $_SESSION['notificError'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    $_SESSION['notificError'] = null;

} elseif (isset($_SESSION['notificSuccess'])) {
    echo '<div class="alert alert-success alert-dismissible fade show mt-5 fs-4 fixed-top start-50 top-0 translate-middle-x " role="alert">
            <strong>Thông báo!</strong> ' .  $_SESSION['notificSuccess'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    $_SESSION['notificSuccess'] = null;
}elseif (isset($_SESSION['notificLogin'])) {
    echo '<div class="alert alert-success alert-dismissible fade show mt-5 fs-4 fixed-top start-50 top-0 translate-middle-x " role="alert">
            <strong>Thông báo!</strong> ' .  $_SESSION['notificLogin'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    $_SESSION['notificLogin'] = null;
}