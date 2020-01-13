<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登陆</title>
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}" media="all"/>
    <link rel="stylesheet" href="{{asset('css/admin/login.css')}}" media="all"/>
    <style>
        /* 覆盖原框架样式 */
        .layui-elem-quote{background-color: inherit!important;}
        .layui-input, .layui-select, .layui-textarea{background-color: inherit; padding-left: 30px;}
    </style>
</head>
<body>
<div class="layui-container">

    <!-- LoginForm -->
    <div class="layui-col-xs12 layui-col-sm12 layui-col-md9">
        <div class="zyl_lofo_main" style="margin-top: 15%">
            <fieldset class="layui-elem-field layui-field-title zyl_mar_02">
                <legend>欢迎登陆 - 后台管理平台</legend>
            </fieldset>
            <div class="layui-row layui-col-space8">
                <form class="layui-form zyl_pad_01" action="">
                    <div class="layui-col-sm12 layui-col-md12">
                        <div class="layui-form-item">
                            <input type="text" name="userName" lay-verify="required|userName" autocomplete="off" placeholder="账号" class="layui-input">
                            <i class="layui-icon layui-icon-username zyl_lofo_icon"></i>
                        </div>
                    </div>
                    <div class="layui-col-sm12 layui-col-md12">
                        <div class="layui-form-item">
                            <input type="password" name="nuse" lay-verify="required|pass" autocomplete="off" placeholder="密码" class="layui-input">
                            <i class="layui-icon layui-icon-password zyl_lofo_icon"></i>
                        </div>
                    </div>
                    <div class="layui-col-sm12 layui-col-md12">
                        <div class="layui-row">
                            <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                                <div class="layui-form-item">
                                    <input type="text" name="vercode" id="vercode" lay-verify="required|vercodes" autocomplete="off" placeholder="验证码" class="layui-input" maxlength="4">
                                    <i class="layui-icon layui-icon-vercode zyl_lofo_icon"></i>
                                </div>
                            </div>
                            <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                                <div class="zyl_lofo_vercode zylVerCode" onclick="zylVerCode()"></div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-sm12 layui-col-md12">
                        <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">立即登录</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- LoginForm End -->
</div>

<!-- Jquery Js -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<!-- Layui Js -->
<script type="text/javascript" src="{{asset('/layui/layui.js')}}"></script>
<!-- Jqarticle Js -->

<script>
    layui.use(['carousel', 'form'], function(){
        var carousel = layui.carousel
            ,form = layui.form;



    });

</script>
</body>
</html>
