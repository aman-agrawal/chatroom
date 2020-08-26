<?php
$room=$_POST['room'];
function erroralert($msg)
{   
	echo '<script>alert("'.$msg.'")</script>'; 
	echo '<script>window.location="http://localhost/chatroom";</script>';
}
if(strlen($room)<3 or strlen($room)>15)
{
	$msg="Please enter chatroom between 3 and 15 characters long";
	erroralert($msg);
}
else if(!ctype_alnum($room))
{
	$msg="Roomname should be alphanumeric only";
	erroralert($msg);
}
else
{
	include 'config.php';
}
$sql="SELECT * FROM `rooms` where roomname='$room'";
$result = mysqli_query($conn, $sql);
if($result)
{
	if(mysqli_num_rows($result)>0)
	{
		$msg="This room is not available, choose different roomname";
		erroralert($msg);
	}
	else
	{
		$sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', CURRENT_TIMESTAMP);";
		if(mysqli_query($conn, $sql))
		{
			echo '<script>window.location="http://localhost/chatroom/rooms.php?roomname=' .$room .'";</script>';
		}
	}
}
?>