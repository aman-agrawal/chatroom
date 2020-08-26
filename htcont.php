<?php
include 'config.php';
$room=$_POST['room'];
$sql="SELECT msg,stime,ip FROM `msgs` where room='$room'";
$result = mysqli_query($conn, $sql);
$res="";
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$res=$res .'<div class="container">' . $row['ip'] . "<br>" . $row['msg'] . '<span class="time-right">' . $row["stime"] . '</span></div>' ;
	}
}
echo $res;
?>