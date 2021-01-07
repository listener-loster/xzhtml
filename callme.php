<?php
	 //1.连接数据库服务器，并判断
	 $link = mysqli_connect("localhost","root","") or die('数据库连接失败！');
	 //2.设置字符集
	 mysqli_set_charset($link, 'utf8');
	 //3.选择数据库
	 mysqli_select_db($link,'xz');
	 $name=$_POST['name'];
	 $phone=$_POST['phone'];
	 $email=$_POST['email'];
	 $product=$_POST['product'];
	 echo "$name,$phone,$email,$product";
	 $sql="insert into indent (name,phone,email,product,date) values ('$name','$phone','$email','$product',now());";
	 if(mysqli_query($link,$sql))
	  {
		  echo "<script>alert('提交成功')</script>";
		  header('location:http://'.$_SERVER['HTTP_HOST']."/xz/index.html");	
	  }
	  else
	  {
		  echo "<script>alert('提交失败')</script>";
		  header('location:http://'.$_SERVER['HTTP_HOST']."/xz/index.html");	
	  }
?>