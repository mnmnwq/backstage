<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','')</title>
    <link rel="stylesheet" href="{{asset('/layui/css/layui.css')}}">
</head>
<body class="layui-layout-body">

@section('body')
@show

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/layui/layui.js')}}"></script>
@section('script')
@show
<script>
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>