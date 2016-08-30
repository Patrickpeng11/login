<?php 
session_start();
if(isset($_SESSION["username"])){
echo "<p>hi &nbsp; user &nbsp;";
echo $_SESSION["username"];
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
}
else{
    header("Location:index.html");
}
?>
<!DOCTYPE HTML>
<html> 
<body>
<form action="changepassword.php" method="post">
change password: <input type="password" name="pass" id="pass"><br>
confirm: <input type="password" name="pass1" id="pass1"><br>
<span id="error"></span>
<span id="error2"></span>
<input type="submit" id="sub">
</form>
<br>
<a href="logout.php">
click here to log out</a>
<br>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
$(document).ready(function abc(){
  $("#pass1,#pass").keyup(function(){
    if($("#pass").val()!==$("#pass1").val()){
      $("#sub").prop("disabled",true);
      $("#error").html("please check the password again")
      return false;
    }
    else{
       $("#sub").prop("disabled",false);
       $("#error").html("match");
    return true;
    }
  });
  $("input").keydown(function(){
  if($("#pass").val().length<=3){
     $("#sub").prop("disabled",true);
     $("#error2").html="at least 3 words";
     
  }
  else{
     $("#error2").html="";
      $("#sub").prop("disabled",false);
       
     abc();
  }
});
});

</script>


</body>
</html>

