<?php
session_start();
$username="";
$email="";
$pwd="";
$u="";
$b=true;
$con=mysqli_connect('localhost','root','','furniture');
  if (isset($_REQUEST['btnlogin'])) {
    $u=$_REQUEST['username'];
     
    $query="SELECT * FROM customer WHERE username= '$u' ";
     $result=mysqli_query($con,$query);
      while($data=mysqli_fetch_array($result)){
       if ($data[6]!=$_REQUEST['username']) {
         
          $username="Invalid Username";
          $b=false;
       }
       if ($data[7]!=$_REQUEST['pwd']) {
          $pwd="Invalid  Password";
          $b=false;
       }

       if ($b==true) {
         $_SESSION['customer'][0]['custid']=$data[0];
         $_SESSION['customer'][1]['custname']=$data[1];
        header("Location:avaliableFurniture.php");
              }
              
       }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <style media="screen">
     body, html {
height: 100%;
}

* {
box-sizing: border-box;
}

.bg-image {
/* The image used */
background-image: url("img/loginbg.jpg");

/* Add the blur effect */

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

/* Position text in the middle of the page/image */
.formbox {
background-color: teal;
color: #000;
font-weight: bold;
 position: absolute;
top: 50%;
left: 50%;
transform: translate( -50%, -50%);
border-radius: 10px;
width:250px;
padding: 20px;
text-align: center;
}


/* Position text in the middle of the page/image */
.bg-text {

  color: #000;
  font-weight: bold;
   position: absolute;
  top: 20%;
  left: 10%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
.formbox input{
  border: solid thin white;
  border-radius: 5px;
  width: 200px;
  height: 30px;
}
.error{
  font-size: 16px;
  color: crimson;
  font-weight: lighter;
}
.btn{
  width: 70px;
  height: 30px;
  border-radius: 10px;
  background-color: white;
  border: solid thin white;
  font-weight: bold;
}
.header{
  color:#fff;
  text-align:center;
  font-weight: lighter;

  font-size: 20px;
  margin-left: 50px;
}
     </style>
  </head>
  <body>
  <div class="bg-image"></div>
<div class="bg-text">
<img src="img/logo.jpg" alt=""width="100"/> <p  style="color:#000;font-size:20px;">Furniture</p>
</div>

<div class="formbox">
  <form class="" action="customerLogin.php" method="post">
    <table  >

      <tr>
        <td class="header" height=70px >Login Here</td>
      </tr>
      <tr>
        <td class="error"><?php  echo $username;echo $pwd; ?></td>
      </tr>
      <tr>

        <td height=50px  > <input type="text" name="username" placeholder="Username" value=""/> </td>
      </tr>

      <tr>

        <td height=50px> <input type="text" name="pwd" placeholder="Password" value=""/> </td>
      </tr>

      <tr>

        <td>  <button class="btn" type="submit" name="btnlogin">Log In</button> </td>
      </tr>

    </table>
  </form>

</div>

  </body>
</html>
