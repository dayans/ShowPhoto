<html>
    <head>
    <style type="text/css">
    div{
        margin:5px;
    }
    .er{
	    color:red;
    	font-size:10px;
    }
    </style>
    </head>
    <h2>欢迎注册</h2>
    <body>
    {{ Form::open(array('url'=>'/registerpost')) }}
    <div><span>用  户  名:</span>
    <input type="text" name="name"> <span class='er'>*{{ isset($er['name'])?$er['name']:'' }}</span><br/></div>
    <div><span>邮&nbsp;&nbsp;&nbsp; 箱:</span>
    <input type="text" name="email"> <span class='er'>*{{ isset($er['email'])?$er['email']:'' }}</div>
    <div><span>密&nbsp;&nbsp;&nbsp; 码:</span>
    <input type="password" name="password"> <span class='er'>*{{ isset($er['password'])?$er['password']:'' }}</span><br/></div>
    <div><span>确认密码:</span>
    <input type="password" name="repassword"> <span class='er'>*{{ isset($er['repassword'])?$er['repassword']:'' }}</span><br/></div>
    <div><span>验  证   码:</span>
    <br/></div>
    <input type="submit" name="register" value="注册">
    {{ Form::close() }}
    </body>
</html>