<?php 
// Include database connection settings
include('../include/dbconn.php');
include ("../login/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		$orders_id = $_GET['id'];		
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
  <b> Admin Dashboard</b>
  <a href="../login/logout.php">Logout</a>
  <br>
  
  <b>User</b>
  <a href="view_user.php">View</a>
  <a href="update_view_user.php">Update</a>
  <a href="search_user.php">Search</a>
  
  <b>Product</b>
  <a href="add_product.php">Add</a>
  <a href="view_product.php">View</a>
  <a href="update_view_product.php">Update</a>
  <a href="search_product.php">Search</a>
  
  <b>Order</b>
  <a href="add_order.php">Add</a>
  <a href="view_order.php">View</a>
  <a href="update_view_order.php">Update</a>
  <a href="search_order.php">Search</a>
	
  <b>Report</b>
  <a href="#">User Report</a>
  <a href="#">Product Report</a>
  <a href="#">Order Report</a>
</div>

<div class="main">
  <div class="greatinguser">
	<h1><?php echo $user; ?></h1>
	<h3>Coffee House Administrator Dashboard</h3>
  </div> 
</div>

<div class="container">

<h3>Verify Order</h3>

<?php
	//$query = "SELECT * FROM orders o, orders_detail od  
			 //WHERE o.orders_id ='$orders_id'
			// AND od.orders_id ='$orders_id'
			 //AND o.orders_id = od.orders_id 
			// AND o.status='processing';
	$query = "SELECT * FROM orders o, orders_detail od, user u
			 WHERE o.orders_id ='$orders_id' AND o.orders_id = od.orders_id AND o.user_id=u.user_id";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_fetch_array($result);
?>

<fieldset>

<form name="edit_user" method="POST" action="db_update_order.php">

    <table width="80%" border="0" align="center">
	 <tr>
        <td width="16%">Order ID</td>  
        <td width="84%">
		 <?php echo ucwords (strtolower($numrow['orders_id'])); ?>
		 <input type="hidden" name="id" value=" <?php echo ($numrow['orders_id']); ?> " />
		</td>
      </tr>  
      <tr>
        <td width="16%">Order </td>  
        <td width="84%">Date : <?php echo ucwords (strtolower($numrow['orders_date'])); ?> </td>
      </tr>  
      <tr>
        <td width="16%">Pickup </td>  
        <td width="84%">
		Date : <?php echo ucwords (strtolower($numrow['orders_pickup_date'])); ?> &nbsp;&nbsp;
		Time : <?php echo ucwords (strtolower($numrow['orders_pickup_time'])); ?> 
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
	  <tr>
        <td width="16%">Status</td>
        <td><?php echo ucwords (strtolower($numrow['status'])); ?> </td>
      </tr>
    </table>
	
	<br><br>
	
		<?php
		$query1 = "SELECT * FROM orders o, orders_detail od, product p  WHERE o.orders_id ='$orders_id' AND o.orders_id = od.orders_id AND od.product_id = p.product_id";
		$result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="80%" border="0" align="center">
	<tr align="left" bgcolor="#f2f2f2">
		<th width="3%">No</td>
        <th width="23%">Product ID</th>
        <th width="23%">Product Name</th> 		
        <th width="17%">Quantity</th>

      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row1['product_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['product_name'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['qty'])); ?></td>  
       </tr> 
            <?php 
      
	   }
	    ?>  
	  <tr> 
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="4"><input type="submit" name="submit" value=" Verify Order " />
        <input type="button" name="cancel" value=" Cancel " onclick="location.href='view_order.php'" /></td>
      </tr>
    </table>
	
	
</form>

</fieldset>
 
</div>
   
</body>

</html> 


























