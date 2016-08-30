<?php
   $username = $_REQUEST["username"];
   $pwd = hash('sha256',$_REQUEST["password"]);
    $dbhandle = new PDO("sqlite:auth.db") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
    $sql=$dbhandle-> prepare("SELECT count(*) from users where username='$username'");
    $sql->execute();
   $resultss = $sql->fetch(PDO::FETCH_ASSOC);
   print_r($resultss['count(*)']);
if($resultss['count(*)']>=1){
         echo '<script type="text/javascript">alert("invalid username");
    window.location.replace("register.html");
    </script>';
    exit();
    }
    else{
    $statement = $dbhandle->prepare("insert into users values (:username,:pwd)");
     $statement->bindParam(':username',$username,PDO::PARAM_STR);
   $statement->bindParam(':pwd',$pwd,PDO::PARAM_STR);
    $statement->execute();
    $_SESSION["username"] = $username;
    $_SESSION["logged_in"] = "1";
 echo 'success';
header( "refresh:1;url=index.html" );
     
    }

?>
