 <?php
 
 $username = $_REQUEST["username"];
   $pwd = hash('sha256',$_REQUEST["password"]);
    $dbhandle = new PDO("sqlite:auth.db") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
    $sql=$dbhandle-> prepare("SELECT count(*) from users where username='$username'");
    $sql->execute();
   $resultss = $sql->fetch(PDO::FETCH_ASSOC);
 if($resultss>=1){
     echo "no";
 }else{
     echo "yes";
 }
     ?>