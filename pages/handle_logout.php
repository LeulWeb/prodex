<?php

// Start the session
session_start();

// Set a session variable


// Unset the session variable
unset($_SESSION['uid']);

// Destroy the session
session_destroy();


header("Location: ../auth/login.php");
exit;
?>