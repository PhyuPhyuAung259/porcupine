<?php
$con=mysqli_connect('localhost','root','','furniture');
session_start();
include "autoID.php";
$oid=autoID("orderfurniture","orderID","O_",5,"O_00001");
$odate=date('Y-m-d');
$custid="";
$did="";
$custname="";
$add="";
$phone="";
$creditno="";
$edate="";
$cbc="";
$status="";
$fid="";
$fname="";
$size="";
$price="";
$qty="";
$quantity="";
$amt="";
$total=0;
if (isset($_SESSION['customer'])) {
   $custname=$_SESSION['customer'][1]['custname'];
   $custid=$_SESSION['customer'][0]['custid'];
}
if (!isset($_SESSION['delivery'])) {
  $did="-";
  $status="Pending";
}
else {
  $did=$_SESSION['delivery'][5]['did'];
  $status="Delivery";
  $orderid=$_SESSION['delivery'][0]['oid'];
  $query="UPDATE orderfurniture
          SET deliveryID='$did',status='$status'
          WHERE orderID='$orderid'";

}
if (isset($_REQUEST['btncheck'])) {
  $oid=$_REQUEST['oid'];
  $odate=$_REQUEST['odate'];
  $custid=$_REQUEST['cid'];
  $did=$_REQUEST['did'];
  $custname=$_REQUEST['cname'];
  $add=$_REQUEST['address'];
  $phone=$_REQUEST['phone'];
  $creditno=$_REQUEST['ccn'];
  $edate=$_REQUEST['edate'];
  $cbc=$_REQUEST['cbc'];
  $total=$_REQUEST['txttotal'];
  $status=$_REQUEST['status'];
  $query="INSERT INTO orderfurniture VALUES ('$oid','$odate','$custid','$did','$custname','
    $add','$phone','$creditno','$edate','$cbc','$total','$status')";
  mysqli_query($con,$query);

  if(isset($_SESSION["list"])){
      $count=count($_SESSION["list"]);
      for($i=0;$i<$count;$i++){
        $oid=$_REQUEST['oid'];
        $fid=$_SESSION["list"][$i]["fid"];
        $fname=$_SESSION["list"][$i]["fname"];
        $price=$_SESSION["list"][$i]["price"];
        $qty=$_SESSION["list"][$i]["qty"];
        $amt=$_SESSION["list"][$i]["amount"];
        $query="INSERT INTO orderdetail VALUES ('$oid','$fid','$fname','$price','$qty','$amt')";

        mysqli_query($con,$query);
  }

}



if (isset($_SESSION['list'])) {

for($i=0;$i<$count;$i++){
  $fid=$_SESSION["list"][$i]["fid"];
  $query="SELECT quantity FROM furniture WHERE furnitureID='$fid'";
  $result=mysqli_query($con,$query);
  $data=mysqli_fetch_array($result);
  $qty=$data[0]-$_SESSION['list'][$i]['qty'];
  $query="UPDATE furniture
          SET quantity='$qty'
          WHERE furnitureID='$fid'";
  mysqli_query($con,$query);

}
}
     if (!isset($_SESSION['delivery'])) {
       $_SESSION["delivery"][0]["oid"]=$_REQUEST['oid'];
       $_SESSION["delivery"][0]["cid"]=$_REQUEST['cid'];
       $_SESSION["delivery"][0]["cname"]=$_REQUEST['cname'];
       $_SESSION["delivery"][0]["deliadd"]=$_REQUEST['address'];
       $_SESSION["delivery"][0]["phno"]=$_REQUEST['phone'];
     }
     else {
         $b=TRUE;
            $count=count($_SESSION['delivery']);
            $_SESSION["delivery"][$count]["oid"]=$_REQUEST['oid'];
            $_SESSION["delivery"][$count]["cid"]=$_REQUEST['cid'];
            $_SESSION["delivery"][$count]["cname"]=$_REQUEST['cname'];
            $_SESSION["delivery"][$count]["deliadd"]=$_REQUEST['address'];
            $_SESSION["delivery"][$count]["phno"]=$_REQUEST['phone'];
        }
       header("Location:../adminLogin/dashboard.php");
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
    .check{
      width: 400px;
      height: auto;
      border-radius: 5px;
      float: left;
      margin-left: 20px;
      margin-bottom: 20px;
      font-size: 15px;
      text-align: left;
      padding: 10px;
    }

    .check input{
      width: 300px;
      height:20px;
    }
      .third {
        margin-top: 20px;
        height: 100%;
      }
      .table{

          float:left;
          text-align: center;
          margin-top: 20px;
          margin-left: 30px;
          font-size: 20px;
           margin-bottom: 30px;

        }


      .btn{
        width: 80px;
        height: 30px;
        border-radius: 5px;
        background-color: teal;

      }
      .header{
        color:#000;
        text-align:left;
        font-weight: lighter;

        font-size: 25px;
        margin-left: 50px;
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
        <div class="third" height=100%>
          <p class="header"> Check out Form</p>
          <div class="check">
            <table>
              <tr>
                <td width>Order ID<br>
                  <input type="text" name="oid" value="<?php echo $oid; ?> " readonly/>
                 </td>
              </tr>
              <tr>
                <td>Order Date<br>
                  <input type="text" name="odate" value="<?php echo $odate; ?>" readonly/>
                 </td>
              </tr>
              <tr>
                <td>Customer ID <br>
                  <input type="text" name="cid" value="<?php echo $custid; ?>" readonly/>
                 </td>
              </tr>
              <tr>
                <td>Delivery ID<br>
                  <input type="text" name="did" value="<?php echo $did; ?>" readonly/>
                 </td>
              </tr>
              <tr>
                <td>Customer Name<br>
                  <input type="text" name="cname" value=" <?php echo $custname; ?>" readonly/>
                 </td>
              </tr>
              <tr>
                <td>Delivery Address<br>
                  <textarea rows = "4" cols = "40" name = "address">

                        </textarea>
                 </td>
              </tr>
              <tr>
                <td>Phone Number<br>
                  <input type="text" name="phone" value=""/>
                 </td>
              </tr>
              <tr>
                <td>Credit Card No<br>
                  <input type="text" name="ccn" value=""/>
                 </td>
              </tr>
              <tr>
                <td>Expire Date<br>
                  <input type="text" name="edate" value=""/>
                 </td>
              </tr>
              <tr>
                <td>CBC No<br>
                  <input type="text" name="cbc" value=""/>
                 </td>
              </tr>
              <tr>
                <td>Total
                  <br>
                    <input type="text" name="txttotal"  value="<?php
                    if (isset($_SESSION["list"])) {

                    for ($j=0; $j <count($_SESSION["list"] ); $j++) {
                      $total=$total+  $_SESSION["list"][$j]["amount"];
                    }
                  }echo $total;
                     ?>"readonly/>
                   </td>
              </tr>
              <tr>
                <td>Status<br>
                  <input type="text" name="status" value="<?php echo $status; ?>" readonly/>
                 </td>
              </tr>
              <tr>
                <td> <br>
                  <button class="btn" type="submit" name="btncheck"> CheckOut</button>                 </td>
              </tr>
            </table>
          </div>
          <div class="table">
            <?php
            // show data from session
            if(isset($_SESSION["list"]))
                  {
                    $count = count($_SESSION['list']);
                      echo "<table width:100;height:100;>";
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
