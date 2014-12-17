<html>
<head>
<title>用户显示界面</title>
<style type="text/css">
#h1{
	color:#8470FF;
	position:fixed;
}
#div1{
	border-top:1px solid #F5F5DC;
	padding-top:3px;
	position:fixed;
	bottom:0;
	width:100%;
	background-color:#F8F8FF;
}
#div2{
	border:1px solid #A9A9A9; 
	width:600;
	position:relative;
	left:30%;
	padding-left:10px;
	padding-bottom:5px;
	margin-top:20px;
}
</style>
<script type="text/javascript">
var xml;
function loadXMLDoc(url,cfunc)
{
	if(window.XMLHttpRequest)
	{
		xml=new XMLHttpRequest();
	}
	else
	{
		xml=new ActiveXObject("Microsoft.XMLHTTP");
	}
xml.onreadystatechange=cfunc;
xml.open("get",url,true);
xml.send();
}

function good(id)
{
	loadXMLDoc("/good/"+id,function()
			{
		if(xml.readyState==4 && xml.status==200)
		{
			document.getElementById('span-' + id).innerHTML=xml.responseText;
			}
		});
}

function check()
{
}
</script>
</head>

<body>
<h2 id="h1">全部动态  当前用户:{{ $data['user'] }}</h2>
<div id="content" style="padding-bottom:100px;">
@foreach($data['key'] as $item)
	<div id="div2">
		<p style="color:C71585">{{ $item['name'] }}:</p>
		<p>{{ $item['introduce'] }}</p>
		<img id="img1"  src = "{{ $item['address'] }}"><br/>
		<button type="button" name="{{ $item['id'] }}" onclick = "good(this.name)">赞</button> 
		<span id = "span-{{ $item['id'] }}">{{ $item['good_number'] }}</span>
		{{ Form::open(array('url'=>'/comment','method'=>'post')) }}
		{{ Form::hidden('id',$item['id']) }}
		{{ Form::text('comment') }}
		{{ Form::submit('评论',array('onclick'=>'check()'))}}
		{{ Form::close() }}
    @foreach($data['com'] as $com)
    @if($item['id']==$com['photo_id'])
        {{ $com['name'] }}:{{ $com['content'] }}<br/>
    @endif  
    @endforeach
	</div>
@endforeach
</div>
	<div id="div1" >
		<form action="/upload" method="post" enctype = "multipart/form-data">
			<label>图片位置:</label> 
			<input type="file" name="img"><br /> 
			<label>介绍:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<input style="height: 50px; width: 500px" type="text" name="words"> 
			<input type="submit" value="提交">
		</form>
	</div>

</body>
</html>