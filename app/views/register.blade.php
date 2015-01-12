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
    <input type="text" id="Txname" onchange="checkName()" name="name"> <span class="er" id="nameEm"></span> <span id="naLenEr" class="er" hidden="true">用户名长度必须为4-8位!</span><span class='er'>*{{ isset($er['name'])?$er['name']:'' }}</span><br/></div>
    <div><span>邮&nbsp;&nbsp;&nbsp; 箱:</span>
    <input type="text" name="email"> <span class='er'>*{{ isset($er['email'])?$er['email']:'' }}</div>
    <div><span>密&nbsp;&nbsp;&nbsp; 码:</span>
    <input type="password" name="password"> <span class='er'>*{{ isset($er['password'])?$er['password']:'' }}</span><br/></div>
    <div><span>确认密码:</span>
    <input type="password" name="repassword"> <span class='er'>*{{ isset($er['repassword'])?$er['repassword']:'' }}</span><br/></div>
    <div><span>验  证   码:</span>
    <br/></div>
    <input type="submit" id="regester" name="register" value="注册">
    {{ Form::close() }}
    <script>
    var na=document.getElementById("Txname");
    var naEr=document.getElementById("nameEm");
    var rule=/[^\w0-9]/i;
    function checkName(){
        if(na.value.length<4||na.value.length>8){
            naEr.style.color="red";
            naEr.innerHTML="用户名长度必须为4-8位!";
        }else if(rule.exec(na.value)){
            naEr.style.color="red";
            naEr.innerHTML="用户名类型必须为数字,字母!";
        }else{
            naEr.innerHTML="ok";
            naEr.style.color="green";
        }
    }
    </script>
    </body>
</html>