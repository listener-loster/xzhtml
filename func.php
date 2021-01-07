<?php
	session_start();
	
	//封装数据库连接函数
	function dbInt(){
	     // $link = mysqli_connect("localhost","root","") or die('数据库连接失败！');
	 	 $link=mysqli_connect('localhost','root','');//连接数据库
	 	    if(!$link){//判断数据库连接成功否，不成功则显示错误信息并终止脚本继续执行
	 	        die('连接数据库失败！'.mysqli_error());
	 	    }
	 		else{
	 			return true;
	 		}
	     //2.设置字符集
	     mysqli_set_charset($link, 'utf8');
	     //3.选择数据库
	     mysqli_select_db($link,'xz');
		 return $link;
	}
	
	//封装执行SQL语句函数
	function Query($sql){
		$link=mysqli_connect('localhost','root','');
		// if($link){
		// 	echo "连接成功";
		// }
		// else{
		// 	echo "连接失败";
		// }
		// $sql = "select * from admin";
		$result = mysqli_query($link,$sql);
	    if(!$result){
			while($row = mysqli_fetch_array($result)){
			     echo "<table border='1'>";
			     echo "<tr>";
			     echo "<td>" . $row["id"] . "</td>";
			     echo "<td>" . $row['username'] . "</td>";
			     echo "<td>" . $row['password'] . "</td>";
			     //echo "<td>"."<a href='deleteMsg.php'>"."添加"."</a>"."<a href='deleteMsg.php'>"."删除"."</a>"."</td>";
			     echo "</tr>";
			     echo "</table>";
			}
			//执行成功
			return $result;
	    }else{
	        //执行失败，显示错误信息以便于调试程序
	        echo 'SQL执行失败<br>';
	        echo '错误的SQL为：',$sql,'<br>';
	        // echo '错误的代码为：',mysqli_errno($result),'<br>';
	        // echo '错误的信息为：',mysqli_error_list($result),'<br>';
	        echo $result;
	    }
	}
	
	//封装结果遍历函数
	function getAll($sql){
		 $link=mysqli_connect('localhost','root','');
		 $results = mysqli_query($link,$sql);
		 //处理查询结果
		 while($row = mysqli_fetch_assoc($results)){
		     echo "<table border='1'>";
		     echo "<tr>";
		     echo "<td>" . $row["id"] . "</td>";
		     echo "<td>" . $row['username'] . "</td>";
		     echo "<td>" . $row['password'] . "</td>";
		     //echo "<td>"."<a href='deleteMsg.php'>"."添加"."</a>"."<a href='deleteMsg.php'>"."删除"."</a>"."</td>";
		     echo "</tr>";
		     echo "</table>";
		}
	}
	
	//封装登录验证函数
	function usercheck($user,$word,$m){
		$link=mysqli_connect('localhost','root','');
		$sure = "select * from admin where username = '$user' and password = '$word'";
		$result = mysqli_query($link,$sure); 
		if($m==$_SESSION['capchar']){
			//$i = mysqli_num_rows($result);
			echo $result;
			if($result == false){
				echo "用户密码输入有误!";
				echo "<br/>".$user."<br/>".$word;
				echo '<script type="text/javascript"> alert("用户或密码输入有误")</script>';
				//header('location:http://'.$_SERVER['HTTP_HOST']."/xz/index.html");
				
			}
			else{
					echo "登录成功";
					$_SESSION['username']=$user;
					echo "<br/>".$user."<br/>".$word;
					//header('location:pTypeView.php');
					//"http://".$_SERVER['HTTP_HOST']."/beecake/files/".$fileName;
					//header('location:http://'.$_SERVER['HTTP_HOST']."/web_skill/admin/pTypeView.html");
					//header('location:http://'.$_SERVER['HTTP_HOST']."/xz/admin/admin.php");	 
			}					 
					 //echo "验证码输入正确";
		}
		else{
			//echo "验证码输入不正确";
			//echo '<script language="JavaScript">;alert("这是";location.href="index.htm";</script>;';
			echo "<script>alert('验证码输入不正确');</script>";
			//header('location:http://'.$_SERVER['HTTP_HOST']."/xz/login/loginpage.php");		
				 return false;
		}
	}
?>