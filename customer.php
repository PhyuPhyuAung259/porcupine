 <?php
 session_start();
include "autoID.php";
$con=mysqli_connect("localhost","root","","furniture");
$custid=autoID("customer","customerID","C_",5,"C_00001");
$custname="";
$address="";
$phone="";
$email="";
$birthdate="";
$username="";
$pwd="";
$cname="";
$a="";
$ph="";
$em="";
$bdate="";
$uname="";
$pw="";

$phoneerror="";
$emailerror="";
$passerror="";
$b=true;
if (isset($_REQUEST["btnsave"])) {
  $custid=$_REQUEST["custid"];
  $custname=$_REQUEST["custname"];
  $address=$_REQUEST["address"];
  $phone=$_REQUEST["phone"];
  $email=$_REQUEST["email"];
  $birthdate=$_REQUEST["birthdate"];
  $username=$_REQUEST["username"];
  $pwd=$_REQUEST["password"];
  if ($custname=="") {
    $cname="Enter Your Name";
    $b=false;
  }
  if ($address=="") {
    $a="Enter Your Address";
    $b=false;
  }
  if ($phone=="") {
    $ph="Enter Your Phone";
    $b=false;
  }
  if ($email=="") {
    $em="Enter Your Email";
    $b=false;
  }
  if($birthdate==""){
    $bdate="Enter Your Date-of-Birth";
    $b=false;
  }
  if ($username=="") {
    $uname="Enter Your Username";
    $b=false;
  }
  if ($pwd=="") {
    $pw="Enter Your Password";
    $b=false;
}

//validation phone number
if ($phone!="" && !preg_match('/^[0-9]{2}-[0-9]{9}$/',$phone)) {
  $phoneerror="Invalid phone format [09-*********]";
  $b=false;
  $phone="";
}
//validation email
if ($email!="" && !filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $emailerror="Invalid email format";
  $b=false;
  $email="";
}
//validation password
if ($pwd!="" && strlen($_REQUEST["password"])<8) {
  $passerror="Your password must contain at least 8 characters!";
  $b=false;
  $pwd="";
}
  if($b==true){
    $query="INSERT INTO customer VALUES('$custid','$custname','$address','$phone','$email','$birthdate','$username','$pwd')";
    mysqli_query($con,$query);

    header("Location:avaliableFurniture.php?msg=register done");
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <style media="screen">
   .menu{
       width:100;
       height:70;
       background-color:#fff;
    }
   .menu a{
       text-decoration: none;
       font-size:20px;
       height:70px;
       float:left;
       margin-left: 60px;
       line-height: 70px;
       text-align: center;
       color:black;
       font-weight: bolder;
   }
   .menu a:hover{
     color: darkgray;
   }
   .first{
     text-align: center;
   }
   .first p{
     color:darkgrey;
     font-size: 25px;
   }
   .box1{
       float:left;
       text-align: center;
       margin-top: 20px;
       font-size: 20px;
       margin-bottom: 30px;
     }

     .third {
       margin-top: 20px;

     }
     .third td{
       width:150px;
     }
     .btn{
       width: 60px;
       height: 30px;
       border-radius: 10px;
       background-color: teal;
     }
     .header{
       color:black;
       text-align: center;
       font-weight: lighter;
       padding-top: 20px;
       font-size: 30px;
     }
     .box{
         float:left;
         text-align: left;
         margin-top: 20px;
         margin-left: 50px;
         margin-bottom: 20px;

       }
       .box a{
           text-decoration: none;
           font-size:20px;
           height:70px;
           text-align: left;
           font-weight:lighterr;
           color: darkgray;
         }
         .box table{
           color: darkgrey;
           font-size: 20px;
         }
         .final{
           border: darkgray thin solid;
           margin-bottom: 20px;
         }
         .footer{
           text-align: right;
           font-size: 15px;
           margin-right: 100px;
           color: teal;
         }
         .footer a{
           text-decoration: none;
           font-size:15px;
           height:70px;
           text-align: left;
           font-weight:lighterr;
           color: teal;
          }
   </style>
  </head>
  <body>
    <div class="first">
      <table width=100%>
        <tr>
          <td width=30%>
         <img src="img/logo.jpg" alt=""width="100"/> <p>Furniture</p>
          </td>
          <td class="menu">

             <a href="customerLogin.php">Log in</a>
             <a href="customer.php">Register</a>
             <a href="avaliableFurniture.php">Furniture</a>

           </td>
        </tr>
        </table>

      </div>
      <div style="clear:left;">  </div>

        <div class="second">
          <img src="img/banner1.jpg" alt="" width="100%" height="50%"/>
        </div>
        <div class="third">
          <p class="header">Customer Registration</p>


          <div class="box1"   >
            <form class="" action="customer.php" method="post">
            <table height=300>
              <tr>
                <td>Customer ID</td>
                <td width=100%>
                  <input style="width:300px;" type="text" name="custid" value="<?php echo $custid;   ?>"/>
                </td>
              </tr>
              <tr>
                <td>CustomerName</td>
                <td width=100%>
                  <input style="width:300px;" type="text" name="custname" value="<?php  echo $custname;echo $cname; ?>"/>
                </td>
              </tr>
              <tr>
                <td>Address</td>
                <td width=100%>
                  <input style="width:300px;" type="text" name="address" value="<?php  echo $address;echo $a; ?>"/>
                </td>
              </tr>
              <tr>
                <td>Phone No:</td>
                <td width=100%>
                  <input style="width:300px;" type="text" name="phone" value="<?php echo $phone;echo $ph; echo $phoneerror;?>"/>
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td width=100%>
                  <input style="width:300px;" type="text" name="email" value="<?php echo $email;echo $em;echo $emailerror; ?>"/>
                </td>
              </tr>
              <tr>
                <tr>
                  <td>Date-of-Birth</td>
                  <td width=100%>
                    <input style="width:300px;" type="text" name="birthdate" value="<?php echo $birthdate;echo $bdate;  ?>"/>
                  </td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td width=100%>
                    <input style="width:300px;" type="text" name="username" value="<?php echo $username;echo $uname; ?>"/>
                  </td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td width=100%>
                    <input style="width:300px;" type="text" name="password" value="<?php echo $pwd;echo $pw;echo $passerror; ?>"/>
                  </td>
                </tr>
                <td></td>
                <td width=100%> <input class="btn" type="submit" name="btnsave" value="Save">
                       </td>

              </tr>

            </table>
          </form>
          </div>
          <div class="box1">
            <img src="img/customer.jpg" alt="" width="550" height="300"/>
          </div>
          </div>
          <div style="clear:left;"></div>
          <div class="final">
            <div class="box">
              <p style="color:black;font-size:25px;text-align:left;">Porcupine Furniture</p>
             <table><tr>
               <td> <img src="https://img.icons8.com/metro/26/000000/facebook-new.png"/></td>
               <td> <img src="https://img.icons8.com/metro/26/000000/instagram.png"/></td>
               <td> <img src="https://img.icons8.com/android/24/000000/twitter.png"/></td>
             </tr>

             </table>

            </div>
            <div class="box">
              <p style="color:black;font-size:25px;text-align:left;">Links</p>
              <p style="color:darkgray;">
                <a href="home.php">Home</a><br>
                <a href="home.php">Furniture</a><br>
                <a href="home.php">Registration</a><br>
                <a href="home.php">Discover</a>
              </p>

            </div>
            <div class="box">
              <p style="color:black;font-size:25px;text-align:left;">Contacts</p>
             <table>
               <tr>
                 <td><img src="https://img.icons8.com/android/24/000000/place-marker.png"/></td>
                 <td>(11) Street,(4) Quarter,kyaiklatt,<br>Ayeyarwady Region:</td>
               </tr>
               <tr>
                 <td><img src="https://img.icons8.com/ios-filled/24/000000/time.png"/></td>
                 <td>Mon - Sat 8.00AM - 6.00PM.<br> Sunday CLOSED</td>
               </tr>
               <tr>
                 <td><img src="https://img.icons8.com/ios-filled/24/000000/phone.png"/></td>
                 <td>09-666-817-062</td>
               </tr>
             </table>
            </div>
            <div class="box">
                <p style="color:black;font-size:25px;text-align:left;">Sign up for updates</p>

              <table>
                <tr>
                  <td>
                    <input style="background-color:darkgrey;width:200px;height:50px;" type="text" name="email" value="Your Email"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input style="background-color: teal;border-radius: 20px;width:100px;height:30px" type="submit" name="subscribe" value="subscribe"/>
                  </td>
                 </tr>
              </table>
            </div>
          </div>
          <div class="footer">
            <p>Create By <a href="http://www.facebook.com/profile.php?id=100017853457306">Phyu Phyu Aung</a> </p>
          </div>
          </form>
        </body>
      </html>
