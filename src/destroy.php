<?php
session_start();
//unset the session
session_unset();
//destroying the session
session_destroy();
//redirect to index.php
header('location:index.php');
?>