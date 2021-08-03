<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
   <center><form method="post" action="login.php">
      <table border="1">
         <tr><td>name:</td><td><input type="text" name="user"></td></tr>
      <tr><td>password:</td><td><input type="password" name="password"></td></tr>
      <tr><td><input type="submit" name="submit" value="login"></td>
   </table>
   </form></center>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
   $name=$_POST['user'];
   $pass=$_POST['password'];
   if($name=="admin" and $pass=="12345")
   {
      echo"<script>alert('login')</script>";
      echo '<script>window.open("showform.php","_self")</script>';
   }
   
   else
   {
      echo "<script>alert('wrong username and password')</script>";
   }
}