<?php
$link=mysqli_connect("localhost:3306","xiaoxin","4728","yixingwu");
header("Content-type:text/html;charset=utf-8");
if($link)
  {  
     //echo"选择数据库成功！";
      if(isset($_POST["sub"]))
      {
        $name=$_POST["username"];
        $password1=$_POST["password"];
        $password2=$_POST["password2"];
        if($name==""||$password1=="")
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完成！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html#myModel5"."\""."</script>";    
          exit;
        }
        if($password1==$password2)
        {
        $str="select count(*) from register where username="."'"."$name"."'";
		$link->query('set names utf8;');
        $result=$link->query($str);
        $pass=mysqli_fetch_assoc($result);
        $pa=$pass[0];
        if($pa==1)
        {
        
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户名已被注册"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";   
        exit; 
        }
        
        
        $sql="insert into register (username,password) VALUES ('$name','$password1')";
        //echo"$sql";
        $link->query('SET NAMES UTF8');
		$link->query($sql);
        $close=mysqli_close($link);
        if($close)
        {
          //echo"数据库关闭";
          //echo"注册成功！";
			echo"<script>alert('注册成功，欢迎登录')</script>"; 
		    echo"<script>
setTimeout('ren()',2000);
function ren()
{
  window.location='index.html';
}
</script>";
        }
        }
        else
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密码不一致！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";    
        }
      }
  }
?>
