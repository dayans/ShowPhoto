<html>
    <head>
        <title>照片列表</title>
        <script type="text/javascript">
        var xml;
        function loadXMLDoc(url,cfunc)
        {
            if (window.XMLHttpRequest)
            {
                xml=new XMLHttpRequest();
            }else
                {
                xml=new ActiveXObject("Microsoft.XMLHTTP");
                }
            xml.onreadystatechange=cfunc;
            xml.open("get",url,true);
            xml.send();
         }
        function del(id)
        {
            loadXMLDoc("/del/"+id,function()
                    {
                if(xml.readyState==4 && xml.status==200)
                {
                 document.getElementById('div-'+id).innerHTML="";   
                    }
                });
        }
        </script>
    </head>
    <body>
    <div style="padding-bottom: 35px">
    <h2 style="left:45%;position:fixed;">照片表</h2>
    </div>
    @foreach($data['user'] as $item)
    <div>
    <p>用户:{{ $item['name'] }}</p>
    @foreach($data['photo'] as $photo)
    @if($item['id'] == $photo['user_id'])
    <div id="div-{{ $photo['id'] }}">
    <div style="float:left;height:200px;width:210px;margin:3px;position:relative;">
    <img style="height:100px;width:155px;" src="{{ $photo['address'] }}"><br/>
    <p>发布时间:{{ $photo['created_at'] }}</p>
    <button onclick="del({{ $photo['id'] }})">删除</button><br/>
    </div>
    </div>
    @endif
    @endforeach
    <div style="clear:both;">
    <hr />
    </div>
    </div>
    @endforeach
    <button style="position:fixed;top:20px;right:10px;"><a href="/inform">用户信息</a></button>
    </body>
</html>