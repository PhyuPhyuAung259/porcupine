<?php
$con=mysqli_connect('localhost','root','','furniture');
session_start();
include "autoID.php";


if (!isset($_SESSION['customer'][1]['custname'])) {
header('Location:customerLogin.php?msg=Please Login First');
}
if (isset($_REQUEST['fid'])) {
$fid=$_REQUEST['fid'];
}

//add to card
if(isset($_REQUEST['addtocard']))
{
      if(!isset($_SESSION['list']))
    {
        $_SESSION['list'][0]['fid']=$_REQUEST['fid'];
        $_SESSION['list'][0]['fname']=$_REQUEST['fname'];
        $_SESSION['list'][0]['typeid']=$_REQUEST['typeid'];
        $_SESSION['list'][0]['size']=$_REQUEST['size'];
        $_SESSION['list'][0]['price']=$_REQUEST['price'];
        $_SESSION['list'][0]['descript']=$_REQUEST['descript'];
        $_SESSION['list'][0]['qty']=$_REQUEST['qty'];
        $_SESSION['list'][0]['amount']=$_REQUEST['price']*$_REQUEST['qty'];
    }
 else {
     $b=TRUE;
        $count=count($_SESSION['list']);
        for($i=1;$i<$count;$i++)
        {
            if($_REQUEST['fid']==$_SESSION['list'][$i]['fid'])
            {
                $b=FALSE;
                $_SESSION['list'][$i]['qty']=$_SESSION['list'][$i]['qty']+$_REQUEST['qty'];
                $_SESSION['list'][$i]['amount']= $_SESSION['list'][$i]['qty']* $_SESSION['list'][$i]['price'];
            }
        }
        if($b==TRUE)
        {
          $_SESSION['list'][$count]['fid']=$_REQUEST['fid'];
          $_SESSION['list'][$count]['fname']=$_REQUEST['fname'];
          $_SESSION['list'][$count]['typeid']=$_REQUEST['typeid'];
          $_SESSION['list'][$count]['size']=$_REQUEST['size'];
          $_SESSION['list'][$count]['price']=$_REQUEST['price'];
          $_SESSION['list'][$count]['descript']=$_REQUEST['descript'];
          $_SESSION['list'][$count]['qty']=$_REQUEST['qty'];
          $_SESSION['list'][$count]['amount']=$_REQUEST['price']*$_REQUEST['qty'];
        }

    }
    header("Location:avaliableFurniture.php?order=order");

}
//for review

 if (isset($_REQUEST['cmt'])) {
   $reviewid=autoID("review","reviewID","R_",3,"R_001");
   if (isset($_SESSION['customer'])) {
    $custid=$_SESSION['customer'][0]['custid'];
   }
   $furnid=$_REQUEST['fid'];

   $review=$_REQUEST['txtreview'];
   $query="INSERT INTO review VALUES('$reviewid','$custid','$furnid','$review')";
   mysqli_query($con,$query);
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

     .photobox{
             background-color: #fff;
             width: 200px;
             height:300px;

             float: left;
             padding:10px;
             margin-left: 50px;
             border-right: solid thin darkgray;
           }
           .mainbox{
             width: 350px;
             height: auto;
             margin-left: 20px;
             border-radius: 5px;
             float: left;
             margin-left: 50px;
             margin-bottom: 20px;
             font-size: 18px;
             text-align: left;
             border-right: solid thin darkgray;
           }
           .mainbox a{
               display:block;
               background-color: teal;
               text-decoration:none;
               border-radius: 5px;
               color: #000;
               padding: 5px;
               height: 25px;
               weight: 80px;
               float:left;
               line-height: 25px;
               margin-left: 20px;
             }
             .review{

               margin-left: 20px;
               border-radius: 5px;
               float: left;
               font-size: 15px;
               text-align: left;
             }
       .third {
         margin-top: 20px;
         height: auto;
       }

       .btn{
         width: 100px;
         height: 30px;
         border-radius: 10px;
         background-color: teal;
         text-align: center;
       }
       .header{
         color:#000;
         text-align:left;
         font-weight: lighter;
         padding-top: 20px;
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
<form class="" action="furnDetail.php" method="post">


       <div class="first">
         <table width=100%>
           <tr>
             <td width=30%>
            <img src="img/logo.jpg" alt=""width="100"/> <p>Furniture</p>
             </td>
             <td class="menu">

                <a href="avaliableFurniture.php">Furniture</a>

                <a href="custlogOut.php">LogOut</a>
             </td>
           </tr>
           </table>
         </div>
         <div style="clear:left;">  </div>


         <div class="second">
           <img src="img/banner1.jpg" alt=""  width=100% />
         </div>
         <div class="third" height=100%>
           <p class="header">Furniture Detail</p>
           <?php
            $fid=$_REQUEST['fid'];
           $query="SELECT * FROM furniture WHERE furnitureID= '$fid'";
           $result=mysqli_query($con,$query);
           $data=mysqli_fetch_array($result);
           echo "<div class='photobox'>";
           echo "<p style='font-size:20px; '>";
           echo $data[1];
           echo "</p>";
           echo "<img src='". $data[7]."' width=200px height=200px/>";
           echo "</div>";

           echo "<div class='mainbox'>";
           echo "<table>";
           echo "<tr>";

           echo "<td width=150 height=40>Furniture ID</td><td >
                  <input type='text' name='fid' id='fid' value='".$fid."' /></td>";
           echo "</tr>";
           echo "<tr>";

           echo "<td width=150 height=40>Furniture Name</td><td >
                  <input type='text' name='fname'id='fname' value='".$data[1]."' /></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td width=150 height=40>Furniture TypeID</td><td>
                 <input type='text' name='typeid' id='typeid' value='".$data[2]."'/></td>";
            echo "</tr>";
           echo "<tr>";
           echo "<td width=150 height=40>Size</td><td>
                 <input type='text' name='size' id='size' value='".$data[4]."'/></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td  width=150 height=40>Price</td><td>
                 <input type='text' name='price' id='price' value='".$data[3]."'/></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td width=150 height=40>Description</td><td>
                 <input type='text' name='descript' id='descript' value='".$data[6]."'/></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td width=150 height=40>Quantity</td><td>
                 <input type='text' name='qty' id='qty'/></td>";
           echo"</tr>";
           echo "</table>";
          echo "<button class='btn' type='submit' name='addtocard'>Add To Card</button>";
          echo "</div>";
          ?>

          <div class="review">
            <input type="text" name="txtreview" value=""/>
            <button class="btn" type="submit" name="cmt">comment</button><br><br>

            <?php
            echo "<table border-collapse: collapse; width:100;height:100;   >";
            echo "<tr style='border: 1px solid black;border-collapse: collapse;' height=50>";
            echo "<td style='border: 1px solid black;border-collapse: collapse;' width=80 >Customer Name</td>";
            echo "<td style='border: 1px solid black;border-collapse: collapse;' width=80 >Comment</td>";
            echo "</tr>";
           // to show table  from  database data
             $query="SELECT customer.customerName,review.comment FROM customer,review
                     WHERE  customer.customerID=review.customerID && review.furnitureID='$fid'";
             $result=mysqli_query($con,$query);
             while($data=mysqli_fetch_array($result)){
               echo "<td style='border: 1px solid black;border-collapse: collapse;' align=center>".$data[0]."</td>";
               echo "<td style='border: 1px solid black;' align=center>".$data[1]."</td>";
               echo "</tr>";
             }
             echo "</table>";
             ?>
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
