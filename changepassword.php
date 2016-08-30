<?php
session_start();
$username=$_SESSION["username"];
$password2=hash("sha256",$_POST["pass"]);
$dbhandle= new PDO("sqlite:auth.db")or die("failed to open DB");
  if (!$dbhandle) die ($error);
$aaa=$dbhandle->prepare("UPDATE users SET pwd='$password2' WHERE username='$username'");
$aaa->execute();
$results=$aaa->fetch(PDO::FETCH_ASSOC);
if (isset($results["pwd"])){
       $_SESSION['logged_in'] = true;
echo "You have successfully changed your password.";
header("Refresh:1,location:index.php");
}
else {
       $_SESSION["logged_in"] = false;
       header("Location: index.html"); /* Redirect browser */
       exit();
   }
?>
