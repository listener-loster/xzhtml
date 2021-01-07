<?php
	 //1.连接数据库服务器，并判断
	 $link = mysqli_connect("localhost","root","") or die('数据库连接失败！');
	 //2.设置字符集
	 mysqli_set_charset($link, 'utf8');
	 //3.选择数据库
	 mysqli_select_db($link,'xz');
	 // session_start();
	 include "../login/login.php";
	 session_start();
	 $opassword=$_POST['opassword'];
	 $npassword=$_POST['npassword'];
	 $cpassword=$_POST['cpassword'];
	 $op="select username from admin where password='$opassword'";
	 $pw=mysqli_query($link,$op);
	 if($pw){
		 if($cpassword==$npassword&&$pw==$_SESSION['username']){
			 $sql="update admin set password = '$npassword' where name="{$_SESSION['username']}"";
			 $result=mysqli_query($link,$sql);
			 echo "修改成功";
			 header('location:http://'.$_SERVER['HTTP_HOST']."/moban/admin/admin.php");	 
		}
		else{
			echo "两次密码不一致";
		}
	 }
	 else{
		 echo "输入密码有误";
	 }
?>