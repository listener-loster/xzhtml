<?php
session_start();
if($_POST['user']==$user && $_POST['pwd']=$pwd){
    //如果登录成功，生成对应bai的会话值。
    $_SESSION['logined']=1;   //判断是否已经登录的依据。
    $_SESSION['user']=$user;  //记录当前登录用户。
}else{
    echo "登录失败，不记录SESSION值";
}
?>