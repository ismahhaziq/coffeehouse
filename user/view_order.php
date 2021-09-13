<?php 
// Include database connection settings
include('../include/dbconn.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
				$user_name = $_SESSION['username'];
				$sqlUSER = "SELECT * FROM user where username = '$user_name' ";
				$queryUSER = mysqli_query($dbconn, $sqlUSER) or die ("Error: " . mysqli_error());
				$rowUSER = mysqli_num_rows($queryUSER);
				$rUSER= mysqli_fetch_assoc($queryUSER);
				$user_id = $rUSER['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  color: #cc7a00;
  background-image:url('');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #ffffff;
}



div {
  max-width: 1100px;
  height: 100px;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #000000;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 6px;
  text-decoration: none;
  font-size: 14px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.greatinguser{
  text-transform: uppercase;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

.container{
  font-family: "Lato", sans-serif;
  color: #000000;
  margin-left: 200px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


</style>
</head>
<body>

<div class="sidenav">
<b>
 Mon-Fri: 8am to 2pm <br>
 Sat-Sun: 11am to 4pm 
</b><br><br>
  <a href="../index.html">HOME</a>
  <a href="#">ABOUT</a>
  <a href="#">COFFEE</a>
  <a href="#">CONTACT</a>
  <!--<a href="login/index.html">LOGIN</a>
  <a href="signup/index.html">SIGNUP</a>-->
  <br>
  <b> Customer Dashboard</b>
  <a href="../login/logout.php">Logout</a>
  <br>
  
  <b>User</b>
  <a href="view_user.php">View</a>
  <a href="update_user.php">Update</a>
  
  <b>Product</b>
  <a href="view_product.php">View</a>
  <a href="search_product.php">Search</a>
  
  <b>Order</b>
  <a href="add_order_product.php">Add</a>
  <a href="view_order.php">View</a>
	
</div>


<div class="main">
  <div class="greatinguser">
	<h1><?php echo $_SESSION['username']; ?></h1>
	<h3>Coffee House Customer Dashboard</h3>
  </div> 
</div>

<div class="container">
  
<?php
	$query = "SELECT * FROM orders o, orders_detail od, user u
			 WHERE o.user_id ='$user_id' AND o.orders_id = od.orders_id AND o.user_id=u.user_id";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_fetch_array($result);
?>

<fieldset>

<form name="edit_user" method="POST" action="db_update_order.php">

    <table width="80%" border="0" align="center">
	 <tr>
        <td width="16%">&nbsp;</td>  
        <td width="84%">
		 <input type="hidden" name="id" value=" <?php echo ($numrow['orders_id']); ?> " />
		</td>
      </tr>  
      <tr>
        <td width="16%">Customer Name</td>
        <td><?php echo ucwords (strtolower($numrow['name'])); ?> </td>
      </tr>
	  <tr>
        <td width="16%">Phone No</td>
        <td><?php echo $numrow['telephone']; ?></td>
      </tr>
    </table>
	
	<br><br>
	
		<?php
		$query1 = "SELECT * FROM orders o, orders_detail od, product p  WHERE o.user_id ='$user_id' AND o.orders_id = od.orders_id AND od.product_id = p.product_id ORDER BY o.orders_id, o.status";
		$result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="80%" border="0" align="center">
	<tr align="left" bgcolor="#f2f2f2">
		<th width="3%">No</td>
        <th>Ordert ID</th>
        <th>Product Name</th>
 		<th>Date Order</th>
        <th>Quantity</th>
		<th>Status</th>

      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row1['orders_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['product_name'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['orders_date'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['qty'])); ?></td> 	
		<td>&nbsp;<?php echo ucwords (strtolower($row1['status'])); ?></td>   
       </tr> 
            <?php 
      
	   }
	    ?>  
	  <tr> 
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="4">
        <input type="button" name="cancel" value=" View Product " onclick="location.href='view_product.php'" />
        <input type="button" name="cancel" value=" Add Order " onclick="location.href='add_order_product.php'" />
		</td>
      </tr>
    </table>
	
	
</form>

</fieldset>




   
   
</div>
   
</body>
</html> 


























