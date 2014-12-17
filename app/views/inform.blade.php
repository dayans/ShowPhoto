<html>
    <head>
    <title>用户信息表</title>
    <style type="text/css">
    td{
	   height:25px;
    }
    input{
	   border:none;
    }
    </style>
    </head>
    <body>
    <h2 style="position:fixed;left:45%;top:20px;">用户信息</h2>
    <button style="position:fixed;right:10px;top:20px;"><a href="/admin/display">用户图片</a></button>
    <div style="margin-top:150px;margin-left:15%;">
    <table border="1" style="width:80%;text-align:center;">
    <tr>
        <td>id</td>
        <td>姓名</td>
        <td>密码</td>
        <td>created_at</td>
        <td>unpdated_at</td>
        <td>修改</td>
        <td>恢复</td>
        <td>完成</td>
    </tr>
    @foreach($data as $item)
    <tr>
    <form action="/change" method="post">
        <input name="id" type="hidden" value="{{ $item['id'] }}">
        <td>{{ $item['id'] }}</td>
        <td><input class="class-{{ $item['id'] }}" name="name" type="text" readOnly="readOnly" value="{{ $item['name'] }}"></td>
        <td><input class="class-{{ $item['id'] }}" name="password" type="text" readOnly="readOnly" value="{{ $item['password'] }}"></td>
        <td>{{ $item['created_at'] }}</td>
        <td>{{ $item['updated_at'] }}</td>
        <td><input type="button" value="修改" onclick="visible({{ $item['id'] }})"></td>
        <td><input type="reset" value="重置" onclick="read()"></td>
        <td><input type="submit" value="完成"></td>
        </form>
    </tr>
    @endforeach
    </table>
    </div>
    <script type="text/javascript">
        function visible(id){
            var x = document.getElementsByTagName("input");
            for(var i = 0; i<x.length;i++){
                if(x[i].className=="class-"+id){
                x[i].removeAttribute("readOnly");
                }
            }
        }
        function read(){
            var x = document.getElementsByTagName("input");
            for(var i = 0; i<x.length;i++){
                x[i].setAttribute("readOnly","true");
            }
        }       
    </script>
    </body>
</html>