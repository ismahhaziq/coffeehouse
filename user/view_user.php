<?php 
// Include database connection settings
include('../include/dbconn.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		
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
  max-width: 500px;
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
  <a href="add_order.php">Add</a>
  <a href="view_order.php">View</a>
	
</div>

<div class="main">
  <div class="greatinguser">
	<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
	<h3>Coffee House Customer Dashboard</h3>
  </div>    
</div>



<div class="main">
<h3> <?php echo ucwords (strtolower($_SESSION['username']));?> Personal Data</h3>

<?php
    $user_name = $_SESSION['username'];
	$query = "SELECT * FROM user where username = '$user_name' ";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_num_rows($result);
?>

    <table width="200%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
        <th width="3%">No</td>
        <th width="26%">Name</td>       
        <th width="8%">Gender</td>
        <th width="35%">Address</td>
        <th width="9%">Telephone</td>
        <th align="center" colspan="2">Action</td>
      </tr>
	  
      <?php
	  	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
	  ?>
		<tr bgcolor='#FFFFCC'>
			<td>&nbsp;<?php echo $a+1; ?></td>
			<td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
   			<td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
			<td><?php echo ucwords (strtolower($row['address'])); ?></td>
			<td>&nbsp;<?php echo $row['telephone']; ?></td>
			<td width="5%">&nbsp;&nbsp;<a class="one" href="detail_user.php?user=<?php echo $user_name ;?>">Detail</a></td>
			<td width="5%">Delete</td>
		</tr> 
      <?php 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="7"><font color="#FF0000">No record avaiable.</font></td>
 			   </tr>'; 
		}
	  }?>
    </table>




   
   
</div>
   
</body>
</html> 


























