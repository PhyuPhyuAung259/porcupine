 <?php
session_start();
$con=mysqli_connect('localhost','root','','furniture');
$order="";
$category="";
if (isset($_REQUEST['category'])) {
  $category=$_REQUEST['category'];
}

 if (isset($_REQUEST['order'])) {
   $order="Successfully add to card";
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



    .mainbox{
      width: 150px;
      height: 230px;
      margin-left: 20px;
      border-radius: 5px;
      float: left;
      background-color: #ccc;
      text-align: left;
      margin-bottom: 50px;
    }
    .mainbox a{
        display:block;
        background-color: teal;
        text-decoration:none;
        color: #000;
        height: 25px;
        width: 60px;
        float:left;
        line-height: 25px;
        margin-left: 20px;
      }

     .third {
       margin-top: 20px;
       text-align: center;
       height: auto;
       margin-bottom: 20px;
     }
     .category{
      background-color: #fff;
     width: 200px;
     height: auto;
      border-radius: 10px;
      float: left;
      padding:10px;
      margin-top: 150px;
      border: solid thin darkgray;
      margin-bottom: 20px;
    }
    .category a{
      text-decoration: none;
      text-align: center;
      color: #000;
      font-size: 18px;
    }
  .category td{
    padding: 10px;
    margin-left: 20px;
    height: 20px;
     text-align: center;
  }
  .avaliable{
    background-color: #fff;
    border-radius: 10px;
    width: 700px;
    height: auto;
    float: left;

  }
     .btn{
       width: 70px;
       height: 30px;
       border-radius: 10px;
       background-color: teal;
     }
     .header{
       color:#000;
       text-align:center;
       font-weight: lighter;
       padding-top: 20px;
       font-size: 25px;

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
    <form  action="avaliableFurniture.php" method="post">
      <div class="first">
        <table width=100%>
          <tr>
            <td width=30%>
           <img src="img/logo.jpg" alt=""width="100"/> <p>Furniture</p>
            </td>
            <td class="menu">
              <?php
              if (!isset($_SESSION['customer']) && !isset($_REQUEST['order']) && !isset($_REQUEST['msg'])){
                 echo "<a href='customerLogin.php'>Login</a>";
                 echo "<a href='customer.php'>Register</a>";
                 echo "<a href='avaliableFurniture.php'>Furniture</a>";
                  echo "<a href='custlogout.php'>LogOut</a>";
              }
              if (isset($_REQUEST['msg']) && !isset($_REQUEST['order']) && !isset($_SESSION['customer'][1]['custname'])){
                echo "<a href='customerLogin.php'>Login</a>";
                echo "<a href='avaliableFurniture.php'>Furniture</a>";
                echo "<a href='custlogOut.php'>LogOut</a>";
              }
              if (isset($_SESSION['customer'][1]['custname']) && !isset($_REQUEST['order'])) {

                echo "<a href='avaliableFurniture.php'>Furniture</a>";
                echo "<a href='custlogOut.php'>LogOut</a>";
              }
              if (isset($_REQUEST['order']) && isset($_SESSION['customer'][1]['custname'])) {
                echo "<a href='avaliableFurniture.php'>Furniture</a>";
                echo "<a href='checkout.php'>Check Out</a>";
                echo "<a href='myProduct.php'>My Product</a>";
                echo "<a href='custlogOut.php'>LogOut</a>";

              }
               ?>
            </td>
          </tr>
          </table>
        </div>
        <div style="clear:left;">  </div>


        <div class="second">
          <img src="img/banner1.jpg" alt=""  width=100%/>
        </div>
        <div class="third">
          <div class="category">
      <h3  align="center">Category</h3><hr/>
      <?php
      $query="SELECT * FROM furnitureType";
      $result=mysqli_query($con,$query);
      echo "<table>";
      while ($data=mysqli_fetch_array($result)) {

        echo "<tr>";
        echo "<td>";
       echo "<a href='avaliableFurniture.php?category=".$data[0]."'> ";
       echo $data[1];
       echo "</a>";
       echo "<br>";
       echo "</td>";
       echo "</tr>";

     }echo "</table>";
       ?>

    </div>
    <div class="avaliable">
          <p class="header">Avaliable Furniture In Our Site</p><br>
          <p  style="text-align:left;color:blue;font-size:20px;"><?php echo $order; ?></p>

             <?php

             if ($category=="") {

            $query="SELECT furnitureID,furnitureName,price,image FROM furniture";
            $result=mysqli_query($con,$query);
            while (  $data=mysqli_fetch_array($result)) {
              $image=$data['image'];
              $image_src=$image;
              $fid=$data['furnitureID'];
              $fname=$data['furnitureName'];
              $price=$data['price'];
              echo "<div class='mainbox'>";
              echo "<table>";
              echo "<tr>";
              echo "<td>";
              echo "<img src='".$image."' width=145px height=80px/>";
              echo "</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>";
              echo "<p>Name:";
              echo $fname;
              echo "</p>";
              echo "<p>Price:";
              echo $price;
              echo "</p>";
              echo "<a href='furnDetail.php?fid=".$fid."'>SeeMore</a>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
              echo "</div>";
              }
}
if ($category!=" ") {
  $query="SELECT furnitureID,furnitureName,price,image FROM furniture WHERE furnitureTypeID='$category'";
  $result=mysqli_query($con,$query);
  while (  $row=mysqli_fetch_array($result)) {
    $image=$row['image'];
    $image_src=$image;
    $fid=$row['furnitureID'];
    $fname=$row['furnitureName'];
    $price=$row['price'];
    echo "<div class='mainbox'>";
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo "<img src='".$image."' width=145px height=80px/>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<p>Name:";
    echo $fname;
    echo "</p>";
    echo "<p>Price:";
    echo $price;
    echo "</p>";
    echo "<a href='furnDetail.php?fid=".$fid."'>SeeMore</a>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
  }
}

  ?>
</div>    </div>
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
