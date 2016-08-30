<?php
session_start();
   $username = $_POST["username"];
   $pwd = hash('sha256',$_POST["password"]);
   $dbhandle = new PDO("sqlite:auth.db") or die("Failed to open DB");
   if (!$dbhandle) die ($error);
   $statement = $dbhandle->prepare("Select * from users where username=:username and pwd=:pwd");
   $statement->bindParam(':username',$username,PDO::PARAM_STR);
   $statement->bindParam(':pwd',$pwd,PDO::PARAM_STR);
   $statement->execute();
 $results = $statement->fetch(PDO::FETCH_ASSOC);
   if (isset($results["pwd"])){
       $_SESSION['logged_in'] = true;
        $_SESSION["username"] = $results["username"];
       echo "Success!  You are logged in.";
 header( "refresh:1;url=alter.php" ); 
 echo 'You\'ll be redirected in about 1 secs. If not, click <a href="alter.php">here</a>.';
   } else {
    echo '<script type="text/javascript">alert("invalid username or password");
    window.location.replace("index.html");
    </script>';
       $_SESSION["logged_in"] = false;
     $_SESSION["errors"]="invalid username or password";
      exit();
   }
?>

