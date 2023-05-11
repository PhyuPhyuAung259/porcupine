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
   .header{
     color:black;
     text-align: center;
     font-weight: lighter;
     padding-top: 20px;
     font-size: 30px;
   }


     .third{
       margin-left: 18px;

     }
     .box1{
             position: relative;
             display: inline-block; /* Make the width of box same as image */
             margin-top: 30px;
             margin-bottom: 20px;
             float: left;

         }
    .box1 .text{
             position: absolute;
             bottom: 20px;
             left: 16px;
       }
     .box1 a{
               text-decoration: none;
               font-size:20px;
               height:70px;
               color:white;
               width: 20%;
       }
       .box1 a:hover{
         text-decoration: underline;
        }
        .box1 .text1 p{
                 position: absolute;
                 top: 30px;
                 right: 30px;
                 color: white;
                 font-weight: lighter;
                 font-size: 15px;
           }
           .fifth a{
             color: black;

           }
           .fifth a.hover{
             color:blue;
             text-decoration: underline;
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

    <form  action="home.php" method="post">
      <div class="first">
        <table width=100%>
          <tr>
            <td width=30%>
           <img src="img/logo.jpg" alt=""width="100"/> <p>Furniture</p>
            </td>
            <td class="menu">
                <?php
                if (!isset($_SESSION['customer']) && !isset($_REQUEST['CID'])) {
                   echo "<a href='customerLogin.php'>Login</a>";
                   echo "<a href='customer.php'>Register</a>";
                   echo "<a href='avaliableFurniture.php'>Furniture</a>";
                   echo "<a href='custlogout.php'>LogOut</a>";

                }
                if (isset($_SESSION['customer']) || isset($_REQUEST['CID'])) {

                  echo "<a href='avaliableFurniture.php'>Furniture</a>";
                  echo "<a href='custlogOut.php'>LogOut</a>";
                }
                 ?>
            </td>
          </tr>
          </table>
        </div>
        <div style="clear:left;">  </div>


        <div class="second">
          <img src="img/banner1.jpg" alt="" width="100%" height="50%"/>
        </div>

      <div class="third">
          <p class="header">Our Products</p>
      <div class="box1" style="margin-left:20px;">
       <img src="img/livingroom1.jpg" alt="Living Room" width="250" height="300"/>
       <div class="text">
           <a href="avaliableFurniture.php">Living Room</a>
       </div>
     </div>
    <div class="box1">
      <img src="img/kitchenroom1.jpg" alt="Living Room" width="250" height="300"/>
      <div class="text">
       <a href="avaliableFurniture.php">Kitchen Room</a>
     </div>
   </div>
    <div class="box1">
      <img src="img/bedroom1.jpg" alt="Living Room" width="250" height="300"/>
      <div class="text">
        <a href="avaliableFurniture.php">Bedroom</a>
      </div>
    </div>
    <div class="box1">
    <img src="img/diningroom1.jpg" alt="Living Room" width="250" height="300"/>
    <div class="text">
         <a href="avaliableFurniture.php">Dining Room</a>
    </div>
    </div>
    <div style="clear:left;"></div>

    <div class="fourth" style="background-color:grey;">
      <div class="box1" style="margin-left:20px;">
        <img src="img/livingroom2.jpg" alt="living room" width="300" height="200"/>
        <div class="text1">
          <p>Living room
          <br><br>UP TO 30% OFF!</p>
        </div>
      </div>
      <div class="box1" style="margin-left:20px;">
        <img src="img/bedroom2.jpg" alt="study table" width="300" height="200"/>

      </div>
      <div class="box1" style="margin-left:20px;">
        <img src="img/kitchenroom2.jpg" alt="living room" width="300" height="200"/>
        <div class="text1">
          <p>See your best furniture
          <br><br>UP TO 30% OFF!</p>
        </div>
      </div>
    </div>
      <div style="clear:left;"></div>

    <div class="fifth">
      <p class="header">New Products</p>
     <table>
       <tr widtd=100%>
         <td width=50%>
           <img src="img/childroom.jpg" alt="child room" width="500" height="200"/>
           <p style="text-align:center;font-size:20px; "><a href="avaliableFurniture.php">Childroom Furniture | $1550</a> </p>
         </td>
         <td width=50%>
           <img src="img/studytable.jpg" alt="child room" width="500" height="200"/>
             <p style="text-align:center;font-size:20px;color:white;"><a href="avaliableFurniture.php">Study Table Furniture | $450</a></p>
         </td>
       </tr>
       <tr>
         <td width=50%>
           <img src="img/wardrobe.jpg" alt="child room" width="500" height="200"/>
            <p style="text-align:center;font-size:20px;color:white;"><a href="avaliableFurniture.php">Wardrobe Furniture | $2000</a></p>
         </td>
         <td width=50%>
           <img src="img/garden.jpg" alt="child room" width="500" height="200"/>
             <p style="text-align:center;font-size:20px;color:white;"><a href="avaliableFurniture.php">Graden  Furniture | $1450</a></p>
         </td>
       </tr>
     </table>
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
            <a href="avaliableFurniture.php">Furniture</a><br>
            <a href="customer.php">Registration</a><br>
            <a href="myProduct.php">MyProduct</a>
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
