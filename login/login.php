<?php
	 include '../func.php';
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $yzm=$_POST['yzm'];
	 dbInt();
	 $s = "select * from admin where username = '$username' and password = '$password'";
	 $a = Query($s);
	 getAll($a);
	 //usercheck($username,$password,$yzm);
?>
