<html>
<h3>请登录</h3>
<form action="/login/check" method="post">
	<lable>用户名:</lable>
	<input type="text" name="name"><br />
	<lable>密码:</lable>&nbsp;&nbsp; 
	<input type="password" name="password"><br /> 
	<input type="submit" value="登录"> 
	<input type="radio" name="identity" value="user">用户
	<input type="radio" name="identity" value="admin">管理员
</form>
</html>