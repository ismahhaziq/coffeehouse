<!DOCTYPE html>
<?php 
include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		
?>
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

select {
        width: 390px;

}
select:focus {
        min-width: 390px;
        width: auto;
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
	<h1><?php echo $_SESSION['username']; ?></h1>
	<h3>Coffee House Administrator Dashboard</h3>
  </div> 
</div>

<div class="container">

<h3>Add Product Data</h3>

<fieldset>

<form name="add_product" method="post" action="db_add_product.php" enctype="multipart/form-data">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="35%">Name</td>  
        <td><input type="text" name="name" size="50" /></td>  
      </tr>  
      <tr> 
        <td width="35%">Description</td>
        <td>
		 <textarea name="description" rows="10" cols="52"> </textarea>
		</td>  
      </tr>
	  <tr>
        <td>Status</td>
        <td>
			<select name="status" style="height: auto">
				<option value='1'> Available </option>
				<option value='2'> Not Available </option>
			</select>		
		</td>
      </tr>
	  <tr>
        <td>Category</td>
        <td>
			<select name="category">
				<option value='1'> Hot </option>
				<option value='2'> Cold </option>
			</select>
		</td>
      </tr>
      <tr>
        <td>Size</td>
        <td>
			<select name="size">
				<option value='1'> Large </option>
				<option value='2'> Medium </option>
			</select>	
		</td>
      </tr>
      <tr>
        <td>Price (RM)</td>
        <td><input type="text" name="price" size="50" /></td> 
      </tr>
	  <tr>
      	<td>Picture</td>
        <td>
          <input type="file" name="file" id="file" />          
		  <img src="../images/<?php echo $row['picture'];?>" width="130" height="130">
		  <input type="hidden" name="pic" value="<?php echo $row['picture'];?>" />
	    </td>
      </tr> 
	  
      <tr> 
        <td colspan="2">
		
		</td>
      </tr>	  
	  
      <tr> 
        <td colspan="2"><input type="submit" name="submit" value=" Save " />
        <input type="button" name="cancel" value=" Cancel " onclick="location.href='update_view_product.php'" /></td>
      </tr>
	  
    </table>
</form>

</fieldset>
 
</div>
   
</body>

</html> 
