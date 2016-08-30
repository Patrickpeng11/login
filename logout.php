<?php
session_start();
$_SESSION['logged_in'] = "false";
session_unset($_SESSION['username']);     // unset $_SESSION variable for the run-time 
session_destroy($_SESSION['username']);   // destroy session data in storage
unset($_SESSION["username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.html");
?>
