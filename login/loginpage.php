<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>注册/登录</title>
    <link rel="stylesheet" href="">
    <style>
		body,h1,h2,h3,h4,h5,h6,p,ul,ol,dl,dd{
			margin: 0;
			padding: 0;
		}
		ul{
			list-style: none;
		}
		.box{
			width: 100vw;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.box .con{
			width: 500px;
			height:300px;
			box-shadow: 0 0 20px #888;
		}
		.box .con form{
			padding: 20px 30px;
		}
		.box .con ul li{
			width:100%;
			height: 40px;
		}
		.box .con ul li input{
			border:1px solid #ccc;
			padding: 0 10px;
			width: 100%;
			height: 30px;
			box-sizing: border-box;
		}
		.box .con ul li:last-child input{
			width: 300px;
			margin-right: 30px;
	        vertical-align: middle;		
		}
		.box .con ul li:last-child img{
			vertical-align: middle;
		}
		.box .con input[type="submit"]{
			height:40px;
			width: 100%;
			line-height:40px;
			background-color: green;
			color: #fff;
			border:none;
			vertical-align: middle;
			text-align:center;
			#margin-left: 50px;
		} 
        tr{
            height:40px;
        }
    </style>
</head>
<body>
	
	<div class="box">
		<div class="con">
			<form action="login.php" method="post">
				<ul>
					<li>
						<input type="text" name="username" id="username" placeholder="请输入用户名">
					</li>
					<li>
						<input type="password" name="password" id="password" placeholder="请输入密码">
					</li>
					<li>
						<input type="text" name="yzm" id="yzm" placeholder="请输入验证码" style="vertical-align: middle;">
						<img src="yzm.php" alt="" style="vertical-align: middle;" onclick="this.src=this.src+'?k='+Math.random();">						
					</li>
				</ul>
				<input type="submit" value="登录">
			</form>
		</div>
	</div>
</body>
