<?php
 session_start();

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

      .third {
        margin-top: 20px;
        height: 100%;text-align: center;
      }

      .table{
        text-align: center;
          float:left;
          text-align: center;
          margin-top: 20px;
          margin-left: 200px;
          font-size: 20px;
           margin-bottom: 30px;
           border-bottom: solid   darkgray;


        }



      .header{
        color:#000;
        text-align:center;
        font-weight: lighter;

        font-size: 25px;
        margin-left: 50px;
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
<form class="" action="checkout.php" method="post">


      <div class="first">
        <table width=100%>
          <tr>
            <td width=30%>
           <img src="img/logo.jpg" alt=""width="100"/> <p>Furniture</p>
            </td>
            <td class="menu">
                <a href="avaliableFurniture.php">Furniture</a>
               <a href="checkout.php">Check Out</a>
               <a href="myProduct.php">My Product</a>
               <a href="custlogOut.php">Log Out</a>

            </td>
          </tr>
          </table>
        </div>
        <div style="clear:left;">  </div>


        <div class="second">
          <img src="img/banner1.jpg" alt="" width="100%" height="50%"/>
        </div>
  <p class="header">My Product</p>
          <div class="table">

            <?php
            // show data from session
            if(isset($_SESSION["list"]))
                  {
                    $count = count($_SESSION['list']);
                    echo "<table width:100;height:100;border:10;>";
                      echo "<tr height=50>";
                      echo "<td width=80,height=50>Furniture ID</td>";
                      echo "<td width=80,height=50>Furniture Name</td>";
                      echo "<td width=80,height=50>Size</td>";
                      echo "<td width=80,height=50>Price</td>";
                      echo "<td width=80,height=50>Quantity</td>";
                      echo "<td width=80,height=50>Amount</td>";

                      echo "</tr>";

                      for($i=0; $i<$count; $i++)
                      {
                        echo "<tr height=50>";


                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["fid"]."</td>";
                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["fname"]."</td>";
                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["size"]."</td>";
                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["price"]."</td>";
                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["qty"]."</td>";
                          echo "<td width=80,height=50>".$_SESSION["list"][$i]["amount"]."</td>";
                        echo "</tr>";
                      }

                    echo "</table>";
                  }
             ?>
          </div>
        </div>
        <div style="clear:left;">  </div>
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
