<?php
			$mydbhost = "localhost";
			$mydbuser = "xiaoxin";
			$mydbpass = '4728';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'yixingwu');
			$sql="INSERT INTO messages (name, email, tel, idea)
			VALUES
			('$_POST[name]','$_POST[email]','$_POST[tel]','$_POST[idea]')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));
 
			}
			mysqli_close($conn);
			echo"<script>alert('感谢您的宝贵意见')</script>"; 
		    echo"<script>
				setTimeout('ren()',1000);
				function ren()
				{
					window.location='message.html';
				}
				</script>";
?>
