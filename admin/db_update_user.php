<?php
include('../include/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}

$path = '\xampp\htdocs\coffeehouse\images/';
$pic = $_FILES["file"]["name"];
$tmplocation = $_FILES["file"]["tmp_name"];
  
	if ($pic=='')
    {
      echo $pic . " already exists. ";
	  $update = "UPDATE user SET
				name='$valuearr[0]',
				gender='$valuearr[1]',
				email='$valuearr[2]',
				telephone='$valuearr[3]',
				address='$valuearr[4]',
				password='$valuearr[6]',
				picture='$valuearr[8]'
				WHERE username='$valuearr[5]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));
	  if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "update_view_user.php"
	  </script>
	  <?php }
    }
    else
    {
      move_uploaded_file($tmplocation, $path . $pic);

	  $update = "UPDATE user SET
				name='$valuearr[0]',
				gender='$valuearr[1]',
				email='$valuearr[2]',
				telephone='$valuearr[3]',
				address='$valuearr[4]',
				password='$valuearr[6]',
				picture='$pic'
				WHERE username='$valuearr[5]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "update_view_user.php"
	  </script>
	  <?php }       
     } 
?>