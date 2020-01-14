<div style="font-size: 120px;font-weight: bolder;color:#009688;margin-left: 5%">YES</div>
<br/>
<div style="margin-left: 2%">操作失败，<span id="t">3</span>秒后跳转，如未跳转请点击<a id="aa" href="#"> 这里 </a>跳转</div>
<script>
        time();
    function time() {
        var times=document.getElementById('t').innerHTML;//开始获取5s
        if (times == 0) {
            var url = document.getElementById('aa').href;
            window.location.href = url;
        } else {
            window.setTimeout('time()', 1000);
            times = times - 1;
            document.getElementById('t').innerHTML = times;
        }
    }
</script>