<?php
    if (session_status() == PHP_SESSION_ACTIVE) { session_destroy(); }
    header("location: login.php");
?>